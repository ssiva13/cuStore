<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Building */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="building-form box box-primary">
    <?php $form = ActiveForm::begin([
        'id' => "building-form",
    ]); ?>
    <div class="box-body table-responsive">
        
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'date_created')->textInput() ?>

        <?= $form->field($model, 'date_modified')->textInput() ?>

        <?= $form->field($model, 'deleted_at')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>