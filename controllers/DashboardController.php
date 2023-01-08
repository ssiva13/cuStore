<?php

namespace app\controllers;

use yii\filters\AccessControl;

class DashboardController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['access'] = [
            'class' => AccessControl::class,
            'rules' => [
                [
                    'actions' => ['lookups','index'],
                    'allow' => true,
                    'roles' => ['@']
                ],
            ],
        ];
        return $behaviors;
    }
    
    public function actionIndex(): string
    {
        return $this->render('index');
    }
    
    public function actionLookups(): string
    {
        return $this->render('lookups');
    }
    
}
