<?php

/* @var $this yii\web\View */
/* @var $model app\models\Building */

$this->title = 'Update Building: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Buildings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['view-actions'] = [];
?>
<div class="building-update">
    
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>