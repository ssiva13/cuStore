<?php

namespace app\controllers;

use Yii;
use app\models\ItemCategory;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ItemCategoryController implements the CRUD actions for ItemCategory model.
 */
class ItemCategoryController extends BaseController
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
     * Lists all ItemCategory models.
     *
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ItemCategory::find(),
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ItemCategory model.
     *
     * @param int $id ID
     *
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView(int $id): string
    {
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('view', [
                'model' => $this->findModel($id),
            ]);
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    /**
     * Creates a new ItemCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return string|\yii\web\Response
     */
    public function actionCreate(): Response|string
    {
        $model = new ItemCategory();
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()) {
                Yii::$app->session->setFlash('success', ['message' => id2human(Yii::$app->controller->id) . " Saved Successfully!"]);
            }else {
                Yii::$app->session->setFlash('error', ['message' => id2human(Yii::$app->controller->id) . " Not Saved!"]);
            }
            return $this->redirect(Yii::$app->request->referrer);
        }
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    /**
     * Updates an existing ItemCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param int $id ID
     *
     * @return string|\yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionUpdate(int $id): Response|string
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()) {
                Yii::$app->session->setFlash('success', ['message' => id2human(Yii::$app->controller->id) . " Updated Successfully!"]);
            }else {
                Yii::$app->session->setFlash('error', ['message' => id2human(Yii::$app->controller->id) . " Not Updated!"]);
            }
            return $this->redirect(Yii::$app->request->referrer);
        }

        if(Yii::$app->request->isAjax){
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    /**
     * Deletes an existing ItemCategory model.
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
            $delete = $this->findModel($id)->delete();
            if($delete) {
                Yii::$app->session->setFlash('success', ['message' => id2human(Yii::$app->controller->id) . " Deleted Successfully!"]);
            }else {
                Yii::$app->session->setFlash('error', ['message' => id2human(Yii::$app->controller->id) . " Not Deleted!"]);
            }
            return $this->redirect(Yii::$app->request->referrer);

    }
    
    /**
     * Finds the ItemCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param int $id ID
     *
     * @return ItemCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id): ItemCategory
    {
        if (($model = ItemCategory::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}