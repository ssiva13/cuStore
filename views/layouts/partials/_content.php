<?php

use app\widgets\CustomAlert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\ArrayHelper;
use yii\web\View;

/** @var View $this */
/** @var string $content */

$icon = ArrayHelper::getValue($this->params, 'view-icon', 'pe-7s-folder');
$actions = $this->params['view-actions'] ?? [];
?>
<!--start toastr message here-->
<!--end toastr message here-->
<div class="content-wrapper">
    <section class="content-header bg-gradient-white">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <?= Breadcrumbs::widget([
                        'links' => $this->params['breadcrumbs'] ?? [],
                        'options' => [
                            'class' => 'float-sm-left'
                        ]
                    ]); ?>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right nav-item dropdown-center dropleft">
                        <button class="btn btn-default" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>Page Actions</span>
                            <i class="fa fa-tasks"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left" style="right: 0 !important;">
                            <span class="dropdown-header">Page Actions</span>
                            <?php foreach ($actions as $action): ?>
                                <div class="dropdown-divider"></div>
                                <?= $action['content'] ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0.1
    </div>

    <strong> &copy; <a href="javascript:void(0)"> <?= Yii::$app->name ?> </a></strong>
</footer>