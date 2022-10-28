<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

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

        <?= $form->field($model, 'date_created')->textInput() ?>

        <?= $form->field($model, 'date_modified')->textInput() ?>

        <?= $form->field($model, 'deleted_at')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>