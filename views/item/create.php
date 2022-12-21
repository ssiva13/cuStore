<?php

/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = 'Create Item';
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="item-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>