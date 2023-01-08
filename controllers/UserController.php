<?php

namespace app\controllers;

use app\models\User;
use app\search\UserSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends BaseController
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
                    'actions' => ['view','index', 'profile'],
                    'allow' => true,
                    'roles' => ['@']
                ],
            ],
        ];
        return $behaviors;
    }

    
    /**
     * Lists all User models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single User model.
     *
     * @param int $id ID
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView(int $id): string
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('view', [
                'model' => $model,
            ]);
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }
    
    
    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param int $id ID
     *
     * @return \yii\web\Response
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionDelete(int $id): Response
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    
    /**
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionProfile(int $id): string
    {
        $model = $this->findModel($id);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('profile', [
                'model' => $model,
            ]);
        }
        return $this->render('profile', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id ID
     *
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): User
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}