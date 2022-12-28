<?php

namespace app\controllers;

use app\components\AuthHandler;
use app\models\ContactForm;
use app\models\form\LoginForm;
use app\models\form\RegisterForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;

class SiteController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function actions(): array
    {
        return [
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'onAuthSuccess'],
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'main-login';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/user/profile', 'id' => Yii::$app->user->identity->id]);
        }
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/user/profile', 'id' => Yii::$app->user->identity->id]);
        }
        
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        
        return $this->redirect('login');
    }
    
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            
            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    /**
     * Login action.
     *
     * @return Response|string
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    public function actionRegister()
    {
        $this->layout = 'main-login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            //send email for confirmation
            return $this->redirect('login');
        }
        $model->password = $model->password_confirm = '';
        return $this->render('register', [
            'model' => $model,
        ]);
    }
    
    /**
     * @param $client
     *
     * @return \yii\web\Response
     * @throws \yii\base\Exception
     */
    public function onAuthSuccess($client): Response
    {
        $auth = (new AuthHandler($client))->handle();
        if ($auth) {
            return $this->redirect(['/user/profile', 'id' => Yii::$app->user->identity->id]);
        }
        return $this->redirect(['/site/login']);
    }
    
}
