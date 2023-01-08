<?php

use app\models\Staff;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="staff-view box box-primary">

    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'staff_number',
                'staff_email:email',
                [
                    'attribute' => 'full_name',
                    'value' => function (Staff $model) {
                        return $model->honorific. ' ' .$model->full_name;
                    },
                ],
                'staff_extension',
                'country_code',
                'phone_prefix',
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
                'date_created',
                'date_modified',
                'deleted_at',
            ],
        ]) ?>
    </div>
</div>