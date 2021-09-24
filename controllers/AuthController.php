<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;

class AuthController extends Controller
{

  public $layout = 'auth';

  /**
   * Login action.
   *
   * @return Response|string
   */
  public function actionLogin()
  {
      if (!Yii::$app->user->isGuest) {
          return $this->goHome();
      }

      $model = new LoginForm();
      if ($model->load(Yii::$app->request->post()) && $model->login()) {
          return $this->goBack();
      }

      if (Yii::$app->request->isAjax) {
          return $this->redirect(['auth/signup']);
      }

      $model->password = '';
      return $this->render('login', [
          'model' => $model,
      ]);
  }

public function actionSignup()
{

  $model = new SignupForm();

  if(Yii::$app->request->isPost)
  {
    $model->load(Yii::$app->request->post());

    if($model->signup()) {
      return $this->redirect(['auth/login']);
    }

  }

  return $this->render('signup', [
    'model' => $model,
  ]);
}


}