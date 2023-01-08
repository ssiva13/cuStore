<?php

namespace app\modules\api\v1;

use Yii;
use yii\base\Module;

/**
 * apiV1 module definition class
 */
class apiV1Module extends Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\v1\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
//        Yii::$app->user->enableSession = false;
//        Yii::$app->user->loginUrl = null;
    }
}
