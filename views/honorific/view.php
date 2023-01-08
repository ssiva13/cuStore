<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Honorific */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Honorifics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="honorific-view box box-primary">

    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'abbreviation',
                'slug',
                'name',
                'date_created',
                'date_modified',
                'deleted_at',
            ],
        ]) ?>
    </div>
</div>