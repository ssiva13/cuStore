<?php

use app\models\Item;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="item-view box box-primary">

    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                'name',
                'slug',
                [
                    'attribute' => 'fk_item_category',
                    'value' => function (Item $model) {
                        return $model->fkItemCategory->name;
                    },
                ],
                'description',
                'date_created',
                'date_modified',
                'deleted_at',
            ],
        ]) ?>
    </div>
</div>