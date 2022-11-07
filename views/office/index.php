<?php

use yii\bootstrap5\Html;
use app\widgets\DataTable;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offices';
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [
    [
        'type' => 'link',
        'content' => Html::button('Create Office', [
            'title' => 'Create Office',
            'value' => Url::toRoute(['office/create']),
            'class' => 'btn-link dropdown-item showModalButton',
        ])
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
            
                            'id',
                'office_name',
                'office_code',
                'fk_building',
                'fk_building_floor',
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