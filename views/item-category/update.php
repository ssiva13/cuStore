<?php

/* @var $this yii\web\View */
/* @var $model app\models\ItemCategory */

$this->title = 'Update Item Category: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Item Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['view-actions'] = [];
?>
<div class="item-category-update">
    
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>