<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'SignUp';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row">
  <div class="col">
    <?php $form = ActiveForm::begin([
        'id' => 'signup-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "<div class=\"col-lg-4\"></div>\n<div class=\"col-lg-4\">{label}\n{input}</div>\n<div class=\"col-lg-4\"></div>",
            'labelOptions' => ['class' => ''],
        ],
      ]); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="form-group">
            <div>
                <?= Html::submitButton('SignUp', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>
<div class="row">
  <div class="col">
    <div style="color:#999;">
        You may signup with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
  </div>
</div>
