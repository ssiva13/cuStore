<?php

namespace app\controllers;

class DashboardController extends BaseController
{
    public function actionIndex(): string
    {
        return $this->render('index');
    }
    
    public function actionLookups(): string
    {
        return $this->render('lookups');
    }
    
}
