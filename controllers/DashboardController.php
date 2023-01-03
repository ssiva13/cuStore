<?php

namespace app\controllers;

class DashboardController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
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
