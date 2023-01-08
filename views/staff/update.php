<?php

/* @var $this yii\web\View */
/* @var $model app\models\Staff */

$this->title = 'Update Staff: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['view-actions'] = [];
?>
<div class="staff-update">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>