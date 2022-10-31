<?php

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = 'Create Department';
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="department-create">
    
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>