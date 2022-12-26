<?php

/* @var $this yii\web\View */
/* @var $model app\models\Honorific */

$this->title = 'Update Honorific: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Honorifics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'abbreviation' => $model->abbreviation]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['view-actions'] = [];
?>
<div class="honorific-update">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>