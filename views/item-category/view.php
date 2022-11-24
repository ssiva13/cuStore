<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ItemCategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Item Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="item-category-view box box-primary">

    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'slug',
                'date_created',
                'date_modified',
                'deleted_at',
            ],
        ]) ?>
    </div>
</div>