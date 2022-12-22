<?php

use app\assets\AppAsset;
use app\widgets\CustomAlert;
use yii\helpers\Html;
use yii\web\View;

/** @var View $this */
/** @var string $content */
$page = str_contains(Yii::$app->request->url, 'register') ? 'register' : 'login';
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title. ' | ' .Yii::$app->name) ?></title>
        <?php $this->head() ?>
    </head>

    <body class="<?=$page?>-page">

    <?php $this->beginBody() ?>

    <div class="<?=$page?>-box bg-gradient-white">
        <div class="login-logo">
            <?= Html::img(Yii::getAlias('@web').'/images/cuStore.png') ?>
        </div>

        <div class="login-card-body ml-2 mr-2">
            <?= CustomAlert::widget(); ?>
        </div>

        <?= $content ?>
    </div>

    <?php $this->endBody() ?>
    </body>

    </html>
<?php $this->endPage() ?>