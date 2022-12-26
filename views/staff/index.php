<?php

use app\widgets\DataTable;
use yii\bootstrap5\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Staff';
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [
    [
        'type' => 'link',
        'content' => Html::button("Create Staff", [
            'title' => "Create Staff",
            'value' => Url::toRoute(['staff/create']),
            'class' => 'btn-link dropdown-item showModalButton',
        ]),
    ],
];
?>
<div class="staff-index box box-primary">
    <div class="box-body table-responsive">
        <?= DataTable::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                
                'id',
                'staff_number',
                'staff_email:email',
                'first_name',
                'last_name',
                 'fk_user',
                 'honorific',
                 'full_name',
                 'staff_extension',
                 'country_code',
                 'phone_prefix',
                 'phone_number',
                 'fk_department',
                 'fk_position',
                 'fk_office',
                 'gender',
                 'date_created',
                 'date_modified',
                
                ['class' => '\app\widgets\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>