<?php

namespace app\models;

use yii\base\Model;

class SignupForm extends Model
{

  public $username;
  public $password;
  public $user_id;

  public function rules()
  {
    return [
      [['username', 'password'], 'required'],
      // [['user_id']]
    ];
  }

  public function signup() 
  {
    if($this->validate()) {
      $user = new User();

      $user->username = $this->username;
      $user->password = $this->password;
      $user->user_id = $this->username;
      
      return $user->create();

    }
  }

}