<?php

use yii\bootstrap5\Html;
use app\widgets\DataTable;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Building Floors';
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [
    [
        'type' => 'link',
        'content' => Html::button('Create Floor', [
            'title' => 'Create Floor',
            'value' => Url::toRoute(['building-floor/create']),
            'class' => 'btn-link dropdown-item showModalButton',
        ])
    ],
];
?>
<div class="building-floor-index box box-primary">
        <?php Pjax::begin(); ?>
    <div class="box-body table-responsive">
             <?= DataTable::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
                            'id',
                'floor_number',
                'floor_code',
                'fk_building',
                'description',
                // 'date_created',
                // 'date_modified',
                // 'deleted_at',

            ['class' => 'yii\grid\ActionColumn'],
            ],
            ]); ?>
            </div>
        <?php Pjax::end(); ?>
</div>