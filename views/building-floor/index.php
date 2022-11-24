<?php

use app\models\BuildingFloor;
use app\widgets\DataTable;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Building Floors';
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [
    [
        'type' => 'link',
        'content' => Html::button("Create Building Floor", [
            'title' => "Create Building Floor",
            'value' => Url::toRoute(['building-floor/create']),
            'class' => 'btn-link dropdown-item showModalButton',
        ]),
    ],
];
?>
<div class="building-floor-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-body table-responsive">
        <?= DataTable::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                
                [
                    'attribute' => 'floor_number',
                    'content' => function (BuildingFloor $model) {
                        return ordinalize($model->floor_number) . ' Floor';
                    },
                ],
                'floor_code',
                [
                    'attribute' => 'fk_building',
                    'header' => '<i class="fa fa-building" aria-hidden="true"></i> Building',
                    'content' => function (BuildingFloor $model) {
                        return $model->fkBuilding->name;
                    },
                ],
                'description',
                
                ['class' => '\app\widgets\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>