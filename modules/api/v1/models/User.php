<?php
/**
 * Created by ssiva on 14/01/2023
 */

namespace app\modules\api\v1\models;

use app\models\User as UserModel;
use Yii;

/**
 *
 * @property-read void $links
 */
class User extends UserModel
{
    public function fields(): array
    {
        return [
            'user_id' => 'id',
            'username' => 'username',
            'email' => 'email',
            'status' => 'active',
            'last_login_at' => 'last_login_at',
            'date_created' => 'date_created',
            'password' => 'password',
            'access_token' => 'access_token',
            'auth_key' => 'auth_key'
        ];
    }
    public function beforeValidate(): bool
    {
        if($this->isNewRecord){
            $this->password = Yii::$app->security->generatePasswordHash($this->password, 15);
            $this->auth_key = Yii::$app->security->generateRandomString(32);
            $this->access_token = Yii::$app->security->generateRandomString(32);
        }
        return parent::beforeValidate();
    }
    
}
