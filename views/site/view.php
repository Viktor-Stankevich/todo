<?php

use yii\widgets\DetailView;

echo DetailView::widget([
  'model' => $model,
  'attributes' => [
    'todo',
    'date',
    'description',
  ],
]);