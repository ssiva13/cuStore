<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Department */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Departments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="department-view box box-primary">

    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
                        'id',
                'name',
                'slug',
                'description',
                'date_created',
                'date_modified',
                'deleted_at',
        ],
        ]) ?>
    </div>
</div>