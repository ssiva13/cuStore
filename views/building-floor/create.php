<?php

/* @var $this yii\web\View */
/* @var $model app\models\BuildingFloor */

$this->title = 'Create Building Floor';
$this->params['breadcrumbs'][] = ['label' => 'Building Floors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="building-floor-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>