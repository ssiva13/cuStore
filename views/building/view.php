<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Building */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Buildings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="building-view box box-primary">

    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                        'id',
                'name',
                'location',
                'address',
                'longitude',
                'latitude',
                'description',
                'date_created',
                'date_modified',
                'deleted_at',
        ],
        ]) ?>
    </div>
</div>