<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form box box-primary">
    <?php $form = ActiveForm::begin([
        'id' => "department-form",
    ]); ?>
    <div class="box-body table-responsive">
        
                <?= $form->field($model, 'name')->textInput() ?>

        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

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