<?php

/* @var $this yii\web\View */
/* @var $model app\models\Building */

$this->title = 'Create Building';
$this->params['breadcrumbs'][] = ['label' => 'Buildings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="building-create">
    
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>