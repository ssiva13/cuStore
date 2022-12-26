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
                        ['label' => 'Items', 'icon' => 'sitemap', 'url' => ['/item'], 'visible' => !Yii::$app->user->isGuest],
                        [
                            'label' => 'Configuration',
                            'icon' => 'cog',
                            'url' => 'javascript:void(0)',
                            'items' => [
                                ['label' => 'Staff', 'icon' => 'id-card', 'url' => ['/staff'], 'visible' => !Yii::$app->user->isGuest],
                                ['label' => 'Users', 'icon' => 'users', 'url' => ['/user'], 'visible' => !Yii::$app->user->isGuest],
                                ['label' => 'Lookup Values', 'icon' => 'map-signs ', 'url' => ['/dashboard/lookups'], 'visible' =>  !Yii::$app->user->isGuest],
                            ],
                            'visible' =>  !Yii::$app->user->isGuest
                        ],
                    ],
                ]
            ) ?>
        </nav>

    </div>

</aside>