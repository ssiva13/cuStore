<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-error mt-2">
    <div class="d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h2 class="display-1 fw-bold"> <?= $name ?> </h2>
            <p class="fs-3"> <span class="text-danger">Opps!</span> <?= nl2br(Html::encode($message)) ?></p>
            <p class="lead">
                The above error occurred while the Web server was processing your request.
            </p>
            <?= \yii\bootstrap5\Html::a('Go Home', Url::to('/'), ['class'=>'btn btn-primary']) ?>
        </div>
    </div>
</div>

