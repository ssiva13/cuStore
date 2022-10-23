<?php

use app\widgets\CustomAlert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\web\View;

/** @var View $this */
/** @var string $content */


?>
<div class="content-wrapper">
    <section class="content-header bg-gradient-white">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <?= Breadcrumbs::widget([
                        'links' => $this->params['breadcrumbs'] ?? [],
                        'options' => [
                            'class' => 'float-sm-right'
                        ]
                    ]); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <?= CustomAlert::widget(); ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.1
    </div>

    <strong> &copy; <a href="javascript:void(0)"> <?= Yii::$app->name ?> </a></strong>
</footer>