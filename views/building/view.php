<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Building */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Buildings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="building-view box box-primary">

    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'name',
                'location',
                'address',
                [
                    'attribute' => 'longitude',
                    'format' => 'raw',
                    'value' => function ($model) {
                        $long = (double)$model->longitude;
                        return $long >= 0 ? "<span class='badge badge-pill badge-info'>$long &deg;N</span>" : "<span class='badge badge-pill badge-info'> $long &deg;S</span>";
                    },
                ],
                [
                    'attribute' => 'latitude',
                    'format' => 'raw',
                    'value' => function ($model) {
                        $lat = (double)$model->latitude;
                        return $lat >= 0 ? "<span class='badge badge-pill badge-info'>$lat &deg;E</span>" : "<span class='badge badge-pill badge-info'> $lat &deg;W</span>";
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