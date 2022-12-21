<?php

use yii\bootstrap5\Html;
use app\widgets\DataTable;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Categories';
$this->params['breadcrumbs'][] = $this->title;

$this->params['view-description'] = '$description';
$this->params['view-icon'] = 'pe-7s-folder';
$this->params['view-actions'] = [
    [
        'type' => 'link',
        'content' => Html::button('Create Category', [
            'title' => 'Create Category',
            'value' => Url::toRoute(['item-category/create']),
            'class' => 'btn-link dropdown-item showModalButton',
        ]),
    ],
];
?>
<div class="item-category-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-body table-responsive">
        <?= DataTable::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'name',
                'slug',
                ['class' => '\app\widgets\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>