<?php

/* @var $this yii\web\View */
/* @var $model app\models\Office */
/* @var $buildingFloors app\models\BuildingFloor */

$this->title = 'Create Office';
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="office-create">
    
    <?= $this->render('_form', [
        'model' => $model,
        'buildingFloors' => $buildingFloors,
    ]) ?>

</div>