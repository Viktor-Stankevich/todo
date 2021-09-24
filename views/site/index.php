<?php
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use app\components\TodoWidget;
use yii\grid\GridView;
?>

<div class="row">
  <div class="col">
    <?php $form = ActiveForm::begin([
      'id' => 'todo-form',
      'layout' => 'horizontal',
      'fieldConfig' => [
        'template' => "<div class=\"col-lg-4\"></div>\n<div class=\"col-lg-4\">{label}\n{input}</div>\n<div class=\"col-lg-4\"></div>",
        'labelOptions' => ['class' => ''],
    ],
      ]); ?>

      <?= $form->field($model, 'todo')->textInput(['autofocus' => true]) ?>
      
      <?= $form->field($model, 'description')->textArea() ?>

      <?= $form->field($model, 'date')->textInput(['type' => 'date']) ?>

      <div class="form-group text-center">
        <div>
          <?= Html::submitButton('Add', ['id' => 'addBtn', 'class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
      </div>
      <?php ActiveForm::end(); ?>
  </div>
</div>
<div class="row">
  <div class="col">
      <?php
        echo GridView::widget([
          'dataProvider' => $dataProvider,
          'columns' => [
            'todo',
            'date',
            ['class' => 'yii\grid\ActionColumn']
          ]
      ]);
      ?>
  </div>
</div>