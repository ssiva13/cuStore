<?php

use app\widgets\DataTable;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="user-index box box-primary">
    <?php Pjax::begin(); ?>

    <div class="box-body table-responsive">
        <?= DataTable::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'username',
                'email:email',
                [
                    'attribute' => 'active_string',
                    'header' => 'Status',
                    'format' => 'raw'
                ],
                'last_login_at',
                'date_created',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>