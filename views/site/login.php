<?php

use app\models\form\LoginForm;
use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
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
            <a href="javascript:void(0)" class="btn btn-block btn-outline-primary">
                <i class="fab fa-google mr-2"></i> Sign in Using Google
            </a>
        </div>
        <!-- /.social-auth-links -->
        <p class="mb-1 float-left">
            <a href="javascript:void(0)">Forgot Password</a>
        </p>
        <p class="mb-1 float-right">
            <a href="javascript:void(0)" class="text-center">Register</a>
        </p>

    </div>
</div>