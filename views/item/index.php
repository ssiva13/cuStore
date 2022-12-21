<?php

use app\widgets\DataTable;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [
    [
        'type' => 'link',
        'content' => Html::button("Create Item", [
            'title' => "Create Item",
            'value' => Url::toRoute(['item/create']),
            'class' => 'btn-link dropdown-item showModalButton',
        ]),
    ],
];
?>
<div class="item-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-body table-responsive">
        <?= DataTable::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                
                'name',
                'slug',
                'fk_item_category',
                'description',
                
                ['class' => '\app\widgets\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>