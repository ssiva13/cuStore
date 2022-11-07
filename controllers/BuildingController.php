<?php

namespace app\controllers;

use Yii;
use app\models\Building;
    use yii\data\ActiveDataProvider;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
* BuildingController implements the CRUD actions for Building model.
*/
class BuildingController extends BaseController
{
/**
* @inheritdoc
*/
public function behaviors()
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
* Lists all Building models.
* @return mixed
*/
public function actionIndex()
{
    $dataProvider = new ActiveDataProvider([
    'query' => Building::find(),
    ]);

    return $this->render('index', [
    'dataProvider' => $dataProvider,
    ]);
}

/**
* Displays a single Building model.
* @param int $id ID
* @return mixed
*/
public function actionView($id)
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
* Creates a new Building model.
* If creation is successful, the browser will be redirected to the 'view' page.
* @return mixed
*/
public function actionCreate()
{
    $model = new Building();

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
* Updates an existing Building model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param int $id ID
* @return mixed
*/
public function actionUpdate($id)
{
$model = $this->findModel($id);

if ($model->load(Yii::$app->request->post()) && $model->save()) {
return $this->redirect(['view', 'id' => $model->id]);

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
* Deletes an existing Building model.
* If deletion is successful, the browser will be redirected to the 'index' page.
* @param int $id ID
* @return mixed
*/
public function actionDelete($id)
{
$this->findModel($id)->delete();
return $this->redirect(['index']);
}

/**
* Finds the Building model based on its primary key value.
* If the model is not found, a 404 HTTP exception will be thrown.
* @param int $id ID
* @return Building the loaded model
* @throws NotFoundHttpException if the model cannot be found
*/
protected function findModel($id)
{
if (($model = Building::findOne($id)) !== null) {
return $model;
}

throw new NotFoundHttpException('The requested page does not exist.');
}
}