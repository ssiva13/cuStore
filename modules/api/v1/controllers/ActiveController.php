<?php

namespace app\modules\api\v1\controllers;

use InvalidArgumentException;
use yii\base\Model;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\Cors;

class ActiveController extends \yii\rest\ActiveController
{
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        
        $auth = $behaviors['authenticator'];
        $auth = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
                HttpBasicAuth::className()
            ]
        ];
        unset($behaviors['authenticator']);
        
        $behaviors['corsFilter'] = [
            'class' => Cors::class,
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Max-Age' => 86400,
                'Access-Control-Expose-Headers' => [],
            ]
        ];
        
        
        return $behaviors;
    }
    
    /**
     * @param Model $model
     * @param array $params
     * @return Model
     * @throws InvalidArgumentException
     */
    public function validate(Model $model, array $params): Model
    {
        $model->load($params, '');
        if (!$model->validate()) {
            throw new InvalidArgumentException(array_values($model->errors));
        }
        return $model;
    }
    
    public function actions(): array
    {
        $actions = parent::actions();
        $actions['delete'] = [
            'class' => 'app\modules\api\v1\actions\DeleteAction',
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
        ];
        return $actions;
    }
    
    
    
    
}
