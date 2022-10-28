<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BuildingFloor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Building Floors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="building-floor-view box box-primary">

    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                        'id',
                'floor_number',
                'floor_code',
                'fk_building',
                'description',
                'date_created',
                'date_modified',
                'deleted_at',
        ],
        ]) ?>
    </div>
</div>