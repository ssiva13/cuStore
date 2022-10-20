<?php

/** @var \yii\web\View $this */

/** @var string $directoryAsset */

use yii\bootstrap5\Html;


?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="javascript:void(0)"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="javascript:void(0)" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown-center dropleft">
            <a class="nav-link" data-bs-toggle="dropdown" href="javascript:void(0)" aria-expanded="false">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right top-100" style="right: 0 !important;">
                <a href="javascript:void(0)" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <?= Html::img(Yii::getAlias('@web') . '/images/' . env('APP_NAME') . '.png', [
                            'alt' => 'User Avatar',
                            'class' => 'img-size-50 img-circle mr-3'
                        ]); ?>
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <?= Html::img($directoryAsset . '/img/user8-128x128.jpg', [
                            'alt' => 'User Avatar',
                            'class' => 'img-size-50 img-circle mr-3'
                        ]); ?>
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <?= Html::img($directoryAsset . '/img/user3-128x128.jpg', [
                            'alt' => 'User Avatar',
                            'class' => 'img-size-50 img-circle mr-3'
                        ]); ?>
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown-center dropleft">
            <a class="nav-link" data-bs-toggle="dropdown" href="javascript:void(0)">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right top-100" style="right: 0 !important;">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="javascript:void(0)" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item dropdown-center dropleft user-menu">
            <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <?= Html::img(Yii::getAlias('@web').'/images/default-150x150.png', [ 'class' => "user-image img-circle elevation-2", 'alt' => (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->username : '']) ?>
                <span class="d-none d-md-inline"><?= Html::encode((!Yii::$app->user->isGuest) ? Yii::$app->user->identity->username : '') ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg top-100" style="right: 0 !important;">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <?= Html::img(Yii::getAlias('@web').'/images/default-150x150.png', [ 'class' => "img-circle elevation-2", 'alt' => (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->username : '']) ?>
                    <?= Html::tag('p',  (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->username : '' . ' <small>Member since Nov. 2012</small>') ?>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                    <div class="row">
                        <div class="col-4 text-center">
                            <a href="javascript:void(0)">Followers</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="javascript:void(0)">Sales</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="javascript:void(0)">Friends</a>
                        </div>
                    </div>
                    <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="javascript:void(0)" class="btn btn-default btn-flat">Profile</a>
                    <?= Html::a(
                        'Sign out',
                        ['/site/logout'],
                        ['data-method' => 'post', 'class' => 'btn btn-default btn-flat float-right']
                    ) ?>
                </li>
            </ul>
        </li>
    </ul>
</nav>