<?php

namespace app\models\form;

use Yii;
use app\models\User;
use yii\base\Model;

/**
 *
 * RegisterForm is the model behind the register form.
 *
 */
class RegisterForm extends Model
{
    public $email;
    public $username;
    public $password;
    public $password_confirm;
    
    /**
     * @inheritdoc
     */
    public function formName():string
    {
        return 'register-form';
    }
    
    /**
     * @return array the validation rules. RegisterForm
     */
    public function rules(): array
    {
        return [
            [['username', 'email', 'password',], 'required'],
            [['password_confirm'], 'required', 'message' => 'Password Confirmation cannot be blank.'],
            ['password_confirm', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords Do Not Match" ],
            [['email'], 'email', 'message' => 'Please provide a valid email address'],
            [['username'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 50],
            [['password_confirm', 'password'], 'string', 'min' => 8],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'username' => 'Username',
            'email' => 'Email Address',
            'password' => 'Password',
            'password_confirm' => 'Confirm Password',
        ];
    }
    
    /**
     * Registers a new user account. If registration was successful it will set flash message.
     *
     * @return bool whether the user is logged in successfully
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    public function register(): bool
    {
        if ($this->validate()) {
            $user = new User();
            $this->loadAttributes($user);
            if (!$user->register()) {
                return false;
            }
            return true;
        }
        return false;
    }
    /**
     * Loads attributes to the user model. You should override this method if you are going to add new fields to the
     * registration form. You can read more in special guide.
     *
     * By default, this method set all attributes of this model to the attributes of User model, so you should properly
     * configure safe attributes of your User model.
     *
     * @param User $user
     */
    protected function loadAttributes(User $user)
    {
        $user->setAttributes($this->attributes);
    }
}
