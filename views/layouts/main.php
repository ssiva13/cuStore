<?php

use app\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use yii\web\View;

/** @var View $this */
/** @var string $content */


$this->registerCssFile('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
AppAsset::register($this);

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <div class="wrapper">

        <?= $this->render(
            'partials/_header.php',
            ['directoryAsset' => $directoryAsset]
        ) ?>

        <?= $this->render(
            'partials/_sidebar.php',
            ['directoryAsset' => $directoryAsset]
        )
        ?>
        <?= $this->render(
            'partials/_content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>

    </div>

    <?php
    Modal::begin([
        'headerOptions' => ['id' => 'main-modalHeader', 'class' => 'bg-heavy-rain'],
        'id' => 'main-modal',
        'size' => Modal::SIZE_DEFAULT,
        'options' => ['class' => 'modal fade'],
        'closeButton' => [
            'id' => 'close-button',
            'class' => 'btn-close',
            'tag' => 'button',
            "aria-label" => "Close",
            'data-bs-dismiss' => 'modal',
        ],
        'clientOptions' => [
            'backdrop' => 'static',
            'keyboard' => false,
        ],
        'footer' => '&copy; '.date('Y'),
        'footerOptions' => ['id' => 'main-modalFooter', 'class' => 'text-center bg-heavy-rain'],
    ]);
    echo "
    <div id='mainModalContent' style='max-height: 500px; overflow-y: auto; overflow-x: hidden;'>
        <div style='text-align:center'>".Html::img('@web/images/loader.gif')."</div>
    </div>";
    Modal::end();
    ?>

    <?php $this->endBody() ?>
    </body>

    </html>
<?php $this->endPage() ?>