<?php

use app\widgets\DataTable;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Honorifics';
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [
    [
        'type' => 'link',
        'content' => Html::button("Create Honorific", [
            'title' => "Create Honorific",
            'value' => Url::toRoute(['honorific/create']),
            'class' => 'btn-link dropdown-item showModalButton',
        ]),
    ],
];
?>
<div class="honorific-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-body table-responsive">
        <?= DataTable::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                
                'abbreviation',
                'slug',
                'name',
                'date_created',
                'date_modified',
                
                ['class' => '\app\widgets\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>