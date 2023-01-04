<?php

use app\models\Staff;
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

                [
                    'attribute' => 'full_name',
                    'value' => function (Staff $model) {
                        return $model->honorific. ' ' .$model->full_name;
                    },
                ],
                'staff_number',
                'staff_email:email',
                'phone_number',
                [
                    'attribute' => 'fk_department',
                    'value' => function (Staff $model) {
                        return ($model->fkDepartment) ? $model->fkDepartment->name : $model->fk_department;
                    },
                ],
                [
                    'attribute' => 'fk_position',
                    'value' => function (Staff $model) {
                        return ($model->fkPosition) ? $model->fkPosition->name : $model->fk_position;
                    },
                ],
                [
                    'attribute' => 'fk_office',
                    'value' => function (Staff $model) {
                        return ($model->fkOffice) ? $model->fkOffice->office_name : $model->fk_office;
                    },
                ],
                [
                    'attribute' => 'gender',
                    'value' => function (Staff $model) {
                        return ($model->fkGender) ? $model->fkGender->name : $model->gender;
                    },
                ],
                 'staff_extension',
                
                ['class' => '\app\widgets\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>