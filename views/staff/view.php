<?php

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
                'deleted_at',
            ],
        ]) ?>
    </div>
</div>