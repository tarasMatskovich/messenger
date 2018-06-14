<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 10.06.2018
 * Time: 19:40
 */

namespace app\models;


use yii\base\Model;

use yii\web\UploadedFile;

class SignUp extends Model
{
    public $email;
    public $password;
    public $confirm_password;
    public $first_name;
    public $second_name;
    public $city;
    public $age;
    public $phone;
    public $about;
    public $img;

    public function rules() {
        return [
            [['email','first_name','second_name','city','phone','about'],'trim'],
            [['email','password','confirm_password','first_name','second_name','city','phone','about'],'required','message'=>'Поле {attribute} обезательное'],
            [['email'],'email', 'message'=>'Поле должно соответсвовать email адресу'],
            [['email'],'unique','targetClass'=>'app\models\User','targetAttribute' => 'email'],
            [['password'],'string','min'=>2,'max'=>10],
            [['first_name'],'string','min'=>2,'max'=>50],
            [['second_name'],'string','min'=>2,'max'=>50],
            [['confirm_password'],'confirmPassword'],
            [['age'],'integer'],
            [['img'], 'file', 'extensions' => 'png, jpg'],

        ];
    }

    public function confirmPassword($attribute,$params) {
        if(!$this->hasErrors()) {
            if($this->password !== $this->confirm_password) {
                $this->addError($attribute,'Пароли должны совпадать');
            }
        }
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Введите ваш email',
            'password' => 'Введите ваш пароль',
            'confirm_password' => 'Повторите ваш пароль',
            'first_name' => 'Введите своё имя',
            'second_name' => 'Введите свою фамилию',
            'city' => 'Введите свой город',
            'age' => 'Введите свой возраст',
            'phone' => 'Введите свой номер телефона',
            'about' => 'Напишите про себя',
            'img' => 'Загрузите свою фотографию'
        ];
    }

    public function signup() {
        $user = new User();
        $user->email = $this->email;
        $user->first_name = $this->first_name;
        $user->second_name = $this->second_name;
        $user->city = $this->city;
        $user->age = $this->age;
        $user->phone = $this->phone;
        $user->about = $this->about;
        $this->img = UploadedFile::getInstance($this,'img');
        $this->upload();
        if($this->img) {
            $user->img = $this->img->name;
        } else {
            $user->img = "no-image.png";
        }
        $user->setPassword($this->password);
        return $user->save();
    }

    public function upload() {
        if($this->validate()) {
            if($this->img) {
                $this->img->saveAs("images/users/{$this->img->baseName}.{$this->img->extension}");
            }
        }
    }


}