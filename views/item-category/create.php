<?php

/* @var $this yii\web\View */
/* @var $model app\models\ItemCategory */

$this->title = 'Create Item Category';
$this->params['breadcrumbs'][] = ['label' => 'Item Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="item-category-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>