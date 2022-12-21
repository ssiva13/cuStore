<?php

use app\models\form\RegisterForm;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

/** @var View $this */
/** @var RegisterForm $model */

$this->title = 'Sign Up';
?>

<div class="card">
    <?php $form = ActiveForm::begin([
        'id' => "user-form",
    ]); ?>
    <div class="card-body login-card-body">
        <p class="login-box-msg">Create Account</p>
        
        <?= $form->field($model, 'username', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><i class="fas fa-user"></i></div></div>',
            'template' => "{beginWrapper}{input}{error}{endWrapper}",
            'wrapperOptions' => [
                'class' => 'input-group mb-3',
            ],
        ])
            ->label(false)
            ->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('username')]); ?>
        
        <?= $form->field($model, 'email', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><i class="fas fa-envelope"></i></div></div>',
            'template' => "{beginWrapper}{input}{error}{endWrapper}",
            'wrapperOptions' => [
                'class' => 'input-group mb-3',
            ],
        ])
            ->label(false)
            ->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('email')]); ?>
        
        <?= $form->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><i class="fas fa-lock"></i></div></div>',
            'template' => "{beginWrapper}{input}{error}{endWrapper}",
            'wrapperOptions' => [
                'class' => 'input-group mb-3',
            ],
        ])
            ->label(false)
            ->passwordInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('password')]); ?>
        
        <?= $form->field($model, 'password_confirm', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><i class="fas fa-lock"></i></div></div>',
            'template' => "{beginWrapper}{input}{error}{endWrapper}",
            'wrapperOptions' => [
                'class' => 'input-group mb-3',
            ],
        ])
            ->label(false)
            ->passwordInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('password_confirm')]); ?>

        <div class="row">
            <div class="col-12">
                <?= Html::submitButton('Register', ['class' => 'btn btn-primary btn-block', 'name' => 'register-button']); ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <?= Html::a(
                Html::img(Yii::getAlias('@web'). '/images/google.png', ['class' => 'auth-img ']). ' Sign Up Using Google',
                Url::toRoute(['site/auth', 'authclient' => 'google']),
                ['class' => 'btn btn-block btn-outline-primary']
            )?>
        </div>
        <p class="mb-1 float-center">
            Already have an account?
            <?= Html::a('Login', Url::toRoute(['site/login']), ['class' => 'text-center']) ?>
        </p>


    </div>
</div>
