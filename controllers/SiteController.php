<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\ContactForm;
use app\models\TodoForm;
use app\models\User;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
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
      $model = new TodoForm();
      
      $dataProvider = new ActiveDataProvider([
        'query' => $model::find()->where(['user_id' => Yii::$app->user->identity->user_id]),
        'pagination' => [
            'pageSize' => 20,
        ],
    ]);

        if(Yii::$app->request->isPost) {
          $model->load(Yii::$app->request->post());
          $model->user_id = Yii::$app->user->identity->user_id;
          $model->save();
          return $this->refresh();
        }

        

        
        // var_dump(Yii::$app->user->identity->user_id);

        return $this->render('index', [
          'model' => $model,
          'dataProvider' => $dataProvider
        ]);
    }

    public function actionView($id)
    {
      $model = new TodoForm();
      $query = $model->findOne($id);
      return $this->render('view', [
        'model' => $query,
      ]);
    }

    public function actionUpdate($id) {
      $model = new TodoForm();
      $query = $model->findOne($id);

      if($query->load(Yii::$app->request->post())) {
        $query->save();
        return $this->goHome();
      }

      return $this->render('edit', [
        'model' => $query
      ]);
    }

    public function actionDelete($id) 
    {
      $model = new TodoForm();
      $query= $model->findOne($id);

        if($query) $query->delete(); 
      
      return $this->goHome();
      

    }

      /**
   * Logout action.
   *
   * @return Response
   */
  public function actionLogout()
  {
      Yii::$app->user->logout();

      return $this->goHome();
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

        public function beforeAction($action)
    {

      if(Yii::$app->user->isGuest AND $this->action-> id !== 'login')
      {
        Yii::$app->user->loginRequired();
      }
      return true;
    }
}
