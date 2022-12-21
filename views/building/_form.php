<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Building */
/* @var $form yii\bootstrap5\ActiveForm */
?>

<div class="building-form box box-primary">
    <?php $form = ActiveForm::begin([
        'id' => "building-form",
    ]); ?>
    <div class="box-body table-responsive p-2">
        
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
        
    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success
        btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>