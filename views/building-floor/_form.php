<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BuildingFloor */
/* @var $form yii\bootstrap5\ActiveForm */

$floors = array_combine(range(-10, 100), range(-10, 100));
?>

<div class="building-floor-form box box-primary">
    <?php $form = ActiveForm::begin([
        'id' => "building-floor-form",
    ]); ?>
    <div class="box-body table-responsive p-2">
        <?= $form->field($model, 'fk_building')->dropDownList( $model->allBuildings, [
            'class' => ['select2-dropdown-single'],
            'value' => $model->fk_building
        ]) ?>
        <?= $form->field($model, 'floor_number')->dropDownList( ArrayHelper::merge([''=>''], $floors), [
            'class' => ['select2-dropdown-single'],
            // change
            'value' => $model->floor_number
            // $model->allBuildingFloors
        ]) ?>
        <?= $form->field($model, 'floor_code')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success
        btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>