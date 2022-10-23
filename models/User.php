<?php

namespace app\models;

use app\traits\SoftDeletes;
use app\traits\TimeStamps;
use Exception;
use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property int $id ID
 * @property string $username Username
 * @property string $email Email Address
 * @property string $password Password
 * @property string|null $access_token Access Token
 * @property string|null $auth_key Auth Key
 * @property int $active Status
 * @property string|null $last_login_at Last Login
 * @property string $date_created Date Created
 * @property string|null $date_modified Date Modified
 */
class User extends ActiveRecord implements IdentityInterface
{
    use SoftDeletes, TimeStamps;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%users}}';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['active'], 'integer'],
            [['last_login_at', 'date_created', 'date_modified', 'deleted_at'], 'safe'],
            [['username'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 150],
            [['access_token', 'auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email Address',
            'password' => 'Password',
            'access_token' => 'Access Token',
            'auth_key' => 'Auth Key',
            'active' => 'Status',
            'last_login_at' => 'Last Login',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'deleted_at' => 'Date Deleted',
        ];
    }
    
    public static function findIdentity($id) {
        return static::findOne($id);
    }
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token]);
    }
    
    public function getId()
    {
        return $this->getAttribute('id');
    }
    
    public function getAuthKey()
    {
        return $this->getAttribute('auth_key');
    }
    
    public function validateAuthKey($authKey): bool
    {
        return $this->getAuthKey() === $authKey;
    }
    
    /**
     * Finds user by email
     *
     * @param string $email
     *
     * @return static|null
     */
    public static function findByEmail(string $email): ?User
    {
        return self::findOne(['email' => $email]);
    }
    
    /**
     * Finds user by username
     * @param string $username
     *
     * @return static|null
     */
    public static function findByUsername(string $username): ?User
    {
        return self::findOne(['username' => $username]);
    }
    
    public function loginByAccessToken($token, $type = null)
    {
        /* @var $class IdentityInterface */
        $class = Yii::$app->user->identityClass;
        $identity = self::findIdentityByAccessToken($token, $type);
        if ($identity && $this->login($identity)) {
            return $identity;
        }
        return null;
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     *
     * @return bool if password provided is valid for current user
     */
    public function validatePassword(string $password): bool
    {
        $hash = $this->password;
        return Yii::$app->getSecurity()->validatePassword($password, $hash);
    }
    /**
     * @throws \yii\base\Exception
     * @throws \yii\db\Exception
     */
    public function register(): bool
    {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $this->password = Yii::$app->security->generatePasswordHash($this->password, 15);
            $this->auth_key = Yii::$app->security->generateRandomString();
            $this->save();
            $transaction->commit();
            return true;
        }catch (Exception $exception){
            $transaction->rollBack();
            Yii::warning($exception->getMessage());
            throw $exception;
        }
    }
    
}
