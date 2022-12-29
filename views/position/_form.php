<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Alert;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Position */
/* @var $form yii\bootstrap5\ActiveForm */
?>

<div class="position-form box box-primary">
    <?php $form = ActiveForm::begin([
        'id' => "position-form",
    ]); ?>
    <div class="box-body table-responsive p-2">

        <?= $this->render('//layouts/partials/_form_errors', [
            'model' => $model,
            'relAttributes' => [
                'fk_department' => 'allDepartments'
            ],
        ]) ?>

        <?= $form->field($model, 'fk_department')->dropDownList( $model->allDepartments, [
            'class' => ['select2-dropdown-single'],
            'value' => $model->fk_department
        ]) ?>
        
        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success
        btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>