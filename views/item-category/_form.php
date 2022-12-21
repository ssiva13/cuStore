<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ItemCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-category-form box box-primary">
    <?php $form = ActiveForm::begin([
        'id' => "item-category-form",
    ]); ?>
    <div class="box-body table-responsive">
        
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>