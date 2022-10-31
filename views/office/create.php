<?php

/* @var $this yii\web\View */
/* @var $model app\models\Office */

$this->title = 'Create Office';
$this->params['breadcrumbs'][] = ['label' => 'Offices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="office-create">
    
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>