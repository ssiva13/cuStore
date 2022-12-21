<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Department */
/* @var $form yii\bootstrap5\ActiveForm */
?>

<div class="department-form box box-primary">
    <?php $form = ActiveForm::begin([
        'id' => "department-form",
    ]); ?>
    <div class="box-body table-responsive p-2">
        
        <?= $form->field($model, 'name')->textInput() ?>
        
        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success
        btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>