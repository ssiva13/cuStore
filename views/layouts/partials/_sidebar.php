<?php

use app\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/** @var View $this */

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <?= Html::a('<img class="brand-image img-circle elevation-3" src="' . (Yii::getAlias('@web') . '/images/cuStore.png') . '" alt="' . env('APP_NAME') . '"><span class="brand-text font-weight-light">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'brand-link']) ?>
    <div class="sidebar">
        <nav class="mt-2">
            <?= Menu::widget(
                [
                    'options' => ['class' => 'nav nav-pills nav-sidebar flex-column', 'data-widget' => 'treeview'],
                    'items' => [
                        ['label' => 'Main Menu', 'header' => true],
                        ['label' => 'Users', 'iconType' => 'fas', 'icon' => 'users', 'url' => Url::toRoute(['user/index']), 'visible' => !Yii::$app->user->isGuest],
                        [
                            'label' => 'Configuration',
                            'icon' => 'share',
                            'url' => 'javascript:void(0)',
                            'items' => [
                                ['label' => 'Gii', 'iconType' => 'far', 'icon' => 'file-code', 'url' => ['/gii'], 'visible' => YII_ENV_DEV],
                                [
                                    'label' => 'Configs',
                                    'iconType' => 'far',
                                    'icon' => 'circle',
                                    'url' => 'javascript:void(0)',
                                    'items' => [
                                        ['label' => 'Item Categories', 'iconType' => 'far', 'icon' => 'file-code', 'url' => ['/item-category'], 'visible' =>  !Yii::$app->user->isGuest],
                                        ['label' => 'Offices', 'iconType' => 'far', 'icon' => 'file-code', 'url' => ['/office'], 'visible' =>  !Yii::$app->user->isGuest],
                                        ['label' => 'Buildings', 'iconType' => 'far', 'icon' => 'file-code', 'url' => ['/building'], 'visible' =>  !Yii::$app->user->isGuest],
                                        ['label' => 'Building Floors', 'iconType' => 'far', 'icon' => 'file-code', 'url' => ['/building-floor'], 'visible' =>  !Yii::$app->user->isGuest],
                                        ['label' => 'Departments', 'iconType' => 'far', 'icon' => 'file-code', 'url' => ['/department'], 'visible' =>  !Yii::$app->user->isGuest],
                                        [
                                            'label' => 'About '.Yii::$app->name,
                                            'iconType' => 'far',
                                            'icon' => 'dot-circle',
                                            'url' => 'javascript:void(0)',
                                            'items' => [
                                                ['label' => 'Contact', 'icon' => 'dot-circle', 'url' => ['site/contact'], 'visible' => YII_ENV_DEV],
                                            ],
                                            'visible' => YII_ENV_DEV
                                        ],
                                    ],
                                    'visible' => YII_ENV_DEV
                                ],
                            ],
                            'visible' =>  !Yii::$app->user->isGuest
                        ],
                    ],
                ]
            ) ?>
        </nav>

    </div>

</aside>