<?php

use app\models\Office;
use app\widgets\DataTable;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offices';
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [
    [
        'type' => 'link',
        'content' => Html::button("Create Office", [
            'title' => "Create Office",
            'value' => Url::toRoute(['office/create']),
            'class' => 'btn-link dropdown-item showModalButton',
        ]),
    ],
];
?>
<div class="office-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-body table-responsive">
        <?= DataTable::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                
                'office_name',
                [
                    'attribute' => 'office_code',
                    'content' => function ($model) {
                        $office_code = $model->office_code;
                        return "<span class='badge badge-pill badge-info'>$office_code</span>" ;
                    },
                ],
                [
                    'attribute' => 'fk_building',
                    'header' => '<i class="fa fa-building" aria-hidden="true"></i> Building',
                    'format' => 'raw',
                    'content' => function (Office $model) {
                        return $model->fkBuilding->name;
                    },
                ],
                [
                    'attribute' => 'fk_building_floor',
                    'format' => 'raw',
                    'content' => function (Office $model) {
                        return $model->fkBuildingFloor->floor_code;
                    },
                ],
                 'description',
                
                ['class' => '\app\widgets\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>