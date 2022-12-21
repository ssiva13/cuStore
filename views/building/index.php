<?php

use app\widgets\DataTable;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buildings';
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [
    [
        'type' => 'link',
        'content' => Html::button("Create Building", [
            'title' => "Create Building",
            'value' => Url::toRoute(['building/create']),
            'class' => 'btn-link dropdown-item showModalButton',
        ]),
    ],
];
?>
<div class="building-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-body table-responsive">
        <?= DataTable::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                
                'name',
                'location',
                'address',
                [
                    'attribute' => 'longitude',
                    'content' => function ($model) {
                        $long = (double)$model->longitude;
                        return $long >= 0 ? "<span class='badge badge-pill badge-info'>$long &deg;N</span>" : "<span class='badge badge-pill badge-info'> $long &deg;S</span>";
                    },
                ],
                [
                    'attribute' => 'latitude',
                    'content' => function ($model) {
                        $lat = (double)$model->latitude;
                        return $lat >= 0 ? "<span class='badge badge-pill badge-info'>$lat &deg;E</span>" : "<span class='badge badge-pill badge-info'> $lat &deg;W</span>";
                    },
                ],
                'description',
                
                ['class' => '\app\widgets\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>