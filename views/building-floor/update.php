<?php

/* @var $this yii\web\View */
/* @var $model app\models\BuildingFloor */

$this->title = 'Update Building Floor: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Building Floors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="building-floor-update">
    
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>