<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Item */
/* @var $form yii\bootstrap5\ActiveForm */
?>

<div class="item-form box box-primary">
    <?php $form = ActiveForm::begin([
        'id' => "item-form",
    ]); ?>
    <div class="box-body table-responsive p-2">
        
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'fk_item_category')->dropDownList( $model->allCategories, [
            'class' => ['select2-dropdown-single'],
        ]) ?>
        
        <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success
        btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>