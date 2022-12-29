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
    
                'full_name',
                'staff_number',
                'staff_email:email',
                'phone_number',
                'fk_department',
                'fk_position',
//                'first_name',
//                'last_name',
//                 'fk_user',
//                 'honorific',
//                 'staff_extension',
//                 'country_code',
//                 'phone_prefix',
//                 'fk_office',
//                 'gender',
                
                ['class' => '\app\widgets\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>