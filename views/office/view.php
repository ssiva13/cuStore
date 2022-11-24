<?php

use app\models\Office;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Office */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="office-view box box-primary">

    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'office_name',
                'office_code',
                [
                    'attribute' => 'fk_building',
                    'header' => '<i class="fa fa-building" aria-hidden="true"></i> Building',
                    'format' => 'raw',
                    'value' => function (Office $model) {
                        return $model->fkBuilding->name;
                    },
                ],
                [
                    'attribute' => 'fk_building_floor',
                    'format' => 'raw',
                    'value' => function (Office $model) {
                        return $model->fkBuildingFloor->floor_code;
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