<?php

use app\models\form\LoginForm;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

/** @var View $this */
/** @var LoginForm $model */

$this->title = 'Sign In';
?>

<div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><i class="fas fa-envelope"></i></div></div>',
            'template' => "{beginWrapper}{input}{error}{endWrapper}",
            'wrapperOptions' => [
                'class' => 'input-group mb-3'
            ]
        ])
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('email')]); ?>

        <?= $form->field($model, 'password', [
            'options' => ['class' => 'form-group has-feedback'],
            'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><i class="fas fa-lock"></i></div></div>',
            'template' => "{beginWrapper}{input}{error}{endWrapper}",
            'wrapperOptions' => [
                'class' => 'input-group mb-3'
            ]
        ])
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]); ?>

        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <?= $form->field($model, 'rememberMe')->checkbox(); ?>
                </div>
            </div>

            <div class="col-12">
                <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']); ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

        <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <?= Html::a(
                Html::img(Yii::getAlias('@web'). '/images/google.png', ['class' => 'auth-img ']). ' Sign In Using Google',
                Url::toRoute(['site/auth', 'authclient' => 'google']),
                ['class' => 'btn btn-block btn-outline-primary']
            )?>
        </div>
        <!-- /.social-auth-links -->
        <p class="mb-1 float-left img-rounded">
            <a href="javascript:void(0)">Forgot Password</a>
        </p>
        <p class="mb-1 float-right">
            <?= Html::a('Register', Url::toRoute(['site/register']), ['class' => 'text-center']) ?>
        </p>

    </div>
</div>