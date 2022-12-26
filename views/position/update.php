<?php

/* @var $this yii\web\View */
/* @var $model app\models\Position */

$this->title = 'Update Position: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['view-actions'] = [];
?>
<div class="position-update">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>