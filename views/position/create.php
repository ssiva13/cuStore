<?php

/* @var $this yii\web\View */
/* @var $model app\models\Position */

$this->title = 'Create Position';
$this->params['breadcrumbs'][] = ['label' => 'Positions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="position-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>