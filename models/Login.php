<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 10.06.2018
 * Time: 12:49
 */

namespace app\models;


use yii\base\Model;

class Login extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    public function rules() {
        return [
            [['email','password'],'required','message'=>'Поле {attribute} обезательное'],
            [['email'],'email', 'message'=>'Поле должно соответсвовать email адресу'],
            [['password'],'validatePassword']
        ];
    }

    public function validatePassword($attribute,$params) {
        if(!$this->hasErrors()) {
            $user = $this->getUser();

            if(!$user || !($user->validatePassword($this->password))) {
                $this->addError($attribute,'Пароль или email неверны');
            }
        }
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Ваш email',
            'password' => 'Ваш пароль'
        ];
    }

    public function getUser() {
        return User::findOne(['email'=>$this->email]);
    }
}