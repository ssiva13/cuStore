<?php

/* @var $this yii\web\View */
/* @var $model app\models\Office */

$this->title = 'Update Office: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['view-actions'] = [];
?>
<div class="office-update">
    
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>