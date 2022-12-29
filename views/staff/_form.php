<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */
/* @var $form yii\bootstrap5\ActiveForm */
?>

<div class="staff-form box box-primary">
    <?php $form = ActiveForm::begin([
        'id' => "staff-form",
    ]); ?>
    <div class="box-body table-responsive p-2">
    
        <?= $form->field($model, 'honorific')->dropDownList( $model->allHonorifics, [
            'class' => ['select2-dropdown-single'],
            'value' => $model->honorific
        ]) ?>

        <?= $form->field($model, 'staff_number')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'staff_email')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'staff_extension')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'country_code')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'phone_prefix')->textInput() ?>
        
        <?= $form->field($model, 'phone_number')->textInput() ?>
        
        <?= $form->field($model, 'fk_position')->textInput() ?>
        
        <?= $form->field($model, 'fk_department')->dropDownList( $model->allDepartments, [
            'class' => ['select2-dropdown-single'],
            'value' => $model->fk_department
        ]) ?>
        
        <?= $form->field($model, 'fk_office')->dropDownList( $model->allOffices, [
            'class' => ['select2-dropdown-single'],
            'value' => $model->fk_office
        ]) ?>
        
        <?= $form->field($model, 'gender')->dropDownList( $model->allGenders, [
            'class' => ['select2-dropdown-single'],
            'value' => $model->gender
        ]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success
        btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>