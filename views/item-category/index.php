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
        'content' => Html::a('Create Category', Url::toRoute(['item-category/create']), [
            'title' => 'Create Category',
            'class' => 'btn-link dropdown-item',
        ])
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

                'id',
                'name',
                'slug',
                'date_created',
                'date_modified',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => ['style' => 'width: 8.7%'],
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::button('View', [
                                'value' => $url, 'class' => 'm-2 btn-transition border-0 btn btn-info showModalButton',
                                'title' => "View $model->name"
                            ]);
                        },
                        'update' => function ($url, $model) {
                            return Html::button('Edit', [
                                'value' => $url, 'class' => 'm-2 btn-transition border-0 btn btn-warning showModalButton',
                                'title' => "Edit $model->name"
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('Delete', $url,
                                [
                                    'value' => $url, 'class' => 'm-2 btn-transition border-0 btn btn-danger',
                                    'title' => "Delete $model->name",
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ]
                                ]
                            );
                        },
                    ],
                ],
            ]
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>