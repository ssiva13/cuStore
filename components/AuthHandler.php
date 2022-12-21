<?php

namespace app\components;

use app\models\Auth;
use app\models\User;
use stdClass;
use Yii;
use yii\authclient\ClientInterface;
use yii\db\Exception;
use yii\helpers\ArrayHelper;

/**
 * Created by ssiva on 21/12/2022
 */
class AuthHandler
{
    /**
     * @var ClientInterface
     */
    private ClientInterface $client;
    
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
    }
    
    /**
     * @return bool
     * @throws \yii\base\Exception
     * @throws \Exception
     */
    public function handle(): bool
    {
        $attributes = $this->client->getUserAttributes();
        $email = ArrayHelper::getValue($attributes, 'email');
        $id = ArrayHelper::getValue($attributes, 'id');
        $nickName = ArrayHelper::getValue($attributes, 'login');
        $nickName = $nickName ?: strstr($email, '@', true);
    
        $auth = Auth::find()->where(['source' => $this->client->getId(), 'source_id' => $id])->one();
        $authUser = new stdClass();
        
        switch ($this->client->getId()){
            case 'google':
                $authUser->id = $id;
                $authUser->email = $email;
                $authUser->username = $nickName;
                $authUser->full_name = ArrayHelper::getValue($attributes, 'name');
                $authUser->given_name = ArrayHelper::getValue($attributes, 'given_name');
                $authUser->family_name = ArrayHelper::getValue($attributes, 'family_name');
                $authUser->active = ArrayHelper::getValue($attributes, 'verified_email') ? 1 : 0;
                $authUser->picture = ArrayHelper::getValue($attributes, 'picture');
                $authUser->locale = ArrayHelper::getValue($attributes, 'locale');
                
                break;
            case 'facebook':
            default:
            
        }
        
        if (Yii::$app->user->isGuest) {
            if ($auth) {
                Yii::$app->session->setFlash('success', ["message" => "User successfully logged in!"]);
                return Yii::$app->user->login($auth->fkUser, Yii::$app->params['user.rememberMeDuration']);
            }
            else {
                if ($email !== null && User::find()->where(['email' => $email])->exists()) {
                    $msg = strtr("User with the same email as in {client} account already exists but isn't linked to it. Login using email first to link it.", [
                        '{client}' => $this->client->getTitle()
                    ]);
                    Yii::$app->session->setFlash('error', ["message" => $msg]);
                    return false;
                }
                else {
                    $authUser->password = Yii::$app->security->generateRandomString(15);
                    $user = new User();
                    $user->setAttributes( (array) $authUser );
                    $user->generateAuthKey();
                    $user->generatePasswordResetToken();
                    
                    $transaction = Yii::$app->db->beginTransaction();
                    try {
                        if ($user->save()) {
                            $auth = new Auth([
                                'fk_user' => $user->id,
                                'source' => $this->client->getId(),
                                'source_id' => (string)$authUser->id,
                            ]);
                            if ($auth->save()) {
                                $transaction->commit();
                                Yii::$app->session->setFlash('success', ["message" => "User successfully created in!"]);
                                return Yii::$app->user->login($user, Yii::$app->params['user.rememberMeDuration']);
                            }
                            else {
                                $transaction->rollBack();
                                $msg = strtr('Unable to save {client} account: {errors}', [
                                    '{client}' => $this->client->getTitle(),
                                    '{errors}' => json_encode($auth->getErrors()),
                                ]);
                                Yii::$app->session->setFlash('error', ["message" => $msg]);
                                return false;
                            }
                        }
                        else {
                            $transaction->rollBack();
                            $msg = strtr('Unable to save {client} user: {errors}', [
                                '{client}' => $this->client->getTitle(),
                                '{errors}' => json_encode($user->getErrors()),
                            ]);
                            Yii::$app->session->setFlash('error', ["message" => $msg]);
                            return false;
                        }
                    }
                    catch(Exception $exception){
                        $transaction->rollBack();
                        $msg = strtr($exception->getMessage(). ' - Saving new auth user from {client}', ['{client}' => $this->client->getTitle()]);
                        Yii::error($msg);
                        Yii::$app->session->setFlash('error', ["message" => $msg]);
                        return false;
                    }
                }
            }
        }
        else {
            if (!$auth) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    $auth = new Auth([
                        'user_id' => Yii::$app->user->id,
                        'source' => $this->client->getId(),
                        'source_id' => $authUser->id,
                    ]);
                    if ($auth->save()) {
                        $transaction->commit();
                        $msg = strtr('Linked {client} account.', ['{client}' => $this->client->getTitle()]);
                        Yii::$app->session->setFlash('success', ["message" => $msg]);
                        return true;
                    } else {
                        $transaction->rollBack();
                        $msg = strtr('Unable to link {client} account: {errors}', [
                            '{client}' => $this->client->getTitle(),
                            '{errors}' => json_encode($auth->getErrors()),
                        ]);
                        Yii::$app->session->setFlash('error', ["message" => $msg]);
                        return false;
                    }
                }
                catch(Exception $exception){
                        $transaction->rollBack();
                        $msg = strtr($exception->getMessage(). ' - Saving auth user from {client}', ['{client}' => $this->client->getTitle()]);
                        Yii::error($msg);
                        Yii::$app->session->setFlash('error', ["message" => $msg]);
                        return false;
                }
            }
            else {
                $msg = strtr('Unable to link {client} account. There is another user using it.', ['{client}' => $this->client->getTitle()]);
                Yii::$app->session->setFlash('error', ["message" => $msg]);
                return false;
            }
        }
    }
}