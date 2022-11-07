<?php

use yii\helpers\Url;
use yii\bootstrap5\Html;
use app\widgets\DataTable;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buildings';
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [
[
'type' => 'link',
'content' => Html::button("Create {$this->title}", [
'title' => "Create {$this->title}",
'value' => Url::toRoute(['building/create']),
'class' => 'btn-link dropdown-item showModalButton',
])
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
            
                            'id',
                'name',
                'location',
                'address',
                'longitude',
                // 'latitude',
                // 'description',
                // 'date_created',
                // 'date_modified',
                // 'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
            ],
            ]); ?>
            </div>
        <?php Pjax::end(); ?>
</div>