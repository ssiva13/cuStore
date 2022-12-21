<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Office */
/* @var $form yii\bootstrap5\ActiveForm */
/* @var $buildingFloors app\models\BuildingFloor */

$url = Url::toRoute(['building-floor/get-floors']);
$this->registerJs("
    function getFloors(elem){
        let bld_id = $(elem).val();
        let bld_floor = $(`#office-building-floor`);
        $.ajax({
            url: `$url`,
            type: 'get',
            dataType: 'json',
            data: {
                building_id: bld_id,
            },
        }).done(function (response) {
            let floors = response.floors
            bld_floor.empty();
            bld_floor.append(new Option('Select', ''));
            $.each(floors, function (key, floor){
                bld_floor.append(new Option(floor.floor_code + ' - ' + floor.description, floor.id));
            });
        }).fail(function (error) {
            console.log(error)
        });
    }
", View::POS_BEGIN);
?>

<div class="office-form box box-primary">
    <?php $form = ActiveForm::begin([
        'id' => "office-form",
    ]); ?>
    <div class="box-body table-responsive">
        
        <?= $form->field($model, 'office_name')->textInput() ?>
        
        <?= $form->field($model, 'office_code')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'fk_building')->dropDownList( $model->allBuildings, [
            'class' => ['select2-dropdown-single'],
            'value' => $model->fk_building,
            'onchange' => "getFloors(this)",
            'onload' => "alert(657646767)",
        ]) ?>
        
        <?= $form->field($model, 'fk_building_floor')->dropDownList( ArrayHelper::map($buildingFloors, 'id', 'floor_code'), [
            'class' => ['select2-dropdown-single'],
            'value' => $model->fk_building_floor,
            'id' => 'office-building-floor'
        ]) ?>

        <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success
        btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>