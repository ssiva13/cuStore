<?php

namespace app\controllers;

use app\models\Honorific;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * HonorificController implements the CRUD actions for Honorific model.
 */
class HonorificController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    /**
     * Lists all Honorific models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Honorific::find(),
        ]);
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('index', [
                'dataProvider' => $dataProvider,
            ]);
        }
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single Honorific model.
     *
     * @param string $abbreviation Title/Honorific Abbreviation
     *
     * @return string
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionView(string $abbreviation): string
    {
        $model = $this->findModel($abbreviation);
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
     * Creates a new Honorific model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Honorific();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        }
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    /**
     * Updates an existing Honorific model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param string $abbreviation Title/Honorific Abbreviation
     *
     * @return string|\yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionUpdate(string $abbreviation)
    {
        $model = $this->findModel($abbreviation);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(Yii::$app->request->referrer);
        }
        if (Yii::$app->request->isAjax) {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    /**
     * Deletes an existing Honorific model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param string $abbreviation Title/Honorific Abbreviation
     *
     * @return \yii\web\Response
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionDelete(string $abbreviation): Response
    {
        $this->findModel($abbreviation)->delete();
        return $this->redirect(Yii::$app->request->referrer);
    }
    
    /**
     * Finds the Honorific model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param string $abbreviation Title/Honorific Abbreviation
     *
     * @return Honorific the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($abbreviation): Honorific
    {
        if (($model = Honorific::findOne($abbreviation)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
        
    }
}