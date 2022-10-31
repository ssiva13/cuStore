<?php

use yii\helpers\Html;
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
                        'id',
                'office_name',
                'office_code',
                'fk_building',
                'fk_building_floor',
                'description',
                'date_created',
                'date_modified',
                'deleted_at',
        ],
        ]) ?>
    </div>
</div>