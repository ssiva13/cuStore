<?php

/* @var $this yii\web\View */
/* @var $model app\models\Staff */

$this->title = 'Create Staff';
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="staff-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>