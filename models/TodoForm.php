<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\User;

class TodoForm extends ActiveRecord
{

  public static function tableName() {
    return 'todo';
  }

  public function rules() {
    return [
      [['todo', 'date'], 'required'],
      [['description'], 'string'],
    ];
  }

}