<?php

/* @var $this yii\web\View */
/* @var $model app\models\Gender */

$this->title = 'Create Gender';
$this->params['breadcrumbs'][] = ['label' => 'Genders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="gender-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>