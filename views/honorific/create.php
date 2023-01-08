<?php

/* @var $this yii\web\View */
/* @var $model app\models\Honorific */

$this->title = 'Create Honorific';
$this->params['breadcrumbs'][] = ['label' => 'Honorifics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['view-actions'] = [];
?>
<div class="honorific-create">
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>