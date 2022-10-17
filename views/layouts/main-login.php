<?php

use app\assets\AppAsset;
use app\widgets\CustomAlert;
use yii\helpers\Html;
use yii\web\View;

/** @var View $this */
/** @var string $content */

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

    <body class="login-page">

    <?php $this->beginBody() ?>

    <div class="login-box">
        <div class="login-logo">
            <?= Html::img(Yii::getAlias('@web').'/images/cuStore.png') ?>
        </div>

        <?= CustomAlert::widget(); ?>

        <?= $content ?>
    </div>

    <?php $this->endBody() ?>
    </body>

    </html>
<?php $this->endPage() ?>