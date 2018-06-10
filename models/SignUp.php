<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 10.06.2018
 * Time: 19:40
 */

namespace app\models;


use yii\base\Model;

class SignUp extends Model
{
    public $email;
    public $password;

    public function rules() {
        return [
            [['email'],'trim'],
            [['email','password'],'required','message'=>'Поле {attribute} обезательное'],
            [['email'],'email', 'message'=>'Поле должно соответсвовать email адресу'],
            [['email'],'unique','targetClass'=>'app\models\User','targetAttribute' => 'email'],
            [['password'],'string','min'=>2,'max'=>10],
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Введите ваш email',
            'password' => 'Введите ваш пароль'
        ];
    }

    public function signup() {
        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->save();
    }


}