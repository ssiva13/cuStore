<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view box box-primary">

    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'username',
                'email:email',
                [
                    'attribute' => 'active',
                    'format' => 'raw'
                ],
                'last_login_at',
                'date_created',
                'date_modified',
            ],
        ]) ?>
    </div>
</div>