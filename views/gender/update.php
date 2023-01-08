<?php

/* @var $this yii\web\View */
/* @var $model app\models\Gender */

$this->title = 'Update Gender: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Genders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'slug' => $model->slug]];
$this->params['breadcrumbs'][] = 'Update';
$this->params['view-actions'] = [];
?>
<div class="gender-update">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>