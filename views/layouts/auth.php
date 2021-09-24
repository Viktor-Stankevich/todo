<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use app\assets\AppAsset;
use yii\bootstrap4\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
  <div class="container text-center">
    <div class="site-login">
      <div class="row">
        <div class="col d-flex justify-content-center">
          <div class="login mr-4">
            <h2>
              <a href="<?= Url::to('login') ?>" class="<?php Url::to() == '/web/auth/login' ? print_r('active') : ''; ?>" >Login</a>
            </h2>
          </div>
          <div class="signUp">
            <h2>
              <a href="<?= Url::to('signup') ?>" class="<?php Url::to() == '/web/auth/signup' ? print_r('active') : ''; ?>">SignUp</a>  
            </h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p>Please fill out the following fields to login:</p>
        </div>
      </div>
      <?= $content ?>
    </div>
  </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
