<?php

use app\models\BuildingFloor;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BuildingFloor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Building Floors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="building-floor-view box box-primary">

    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'floor_code',
                [
                    'attribute' => 'floor_number',
                    'format' => 'raw',
                    'value' => function (BuildingFloor $model) {
                        return ordinalize($model->floor_number) . ' Floor';
                    },
                ],
                'floor_code',
                [
                    'attribute' => 'fk_building',
                    'header' => '<i class="fa fa-building" aria-hidden="true"></i> Building',
                    'format' => 'raw',
                    'value' => function (BuildingFloor $model) {
                        return $model->fkBuilding->name;
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