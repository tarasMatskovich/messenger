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

class Edit extends Model
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
            [['email','first_name','second_name','city','about'],'trim'],
            [['email','password','confirm_password','first_name','second_name','city','phone','about'],'required','message'=>'Поле {attribute} обезательное'],
            [['email'],'email', 'message'=>'Поле должно соответсвовать email адресу'],
            [['email'],'myUnique'],
            [['phone'],'string','max'=>12],
            [['password'],'string','min'=>2,'max'=>10],
            [['first_name'],'string','min'=>2,'max'=>50],
            [['second_name'],'string','min'=>2,'max'=>50],
            [['password'],'confirmPassword'],
            [['age'],'integer'],
            [['img'], 'file', 'extensions' => 'png, jpg'],

        ];
    }

    public function myUnique($attribute,$params) {
        $users = User::find()->select('email,id')->all();
        if($users) {
            foreach($users as $user) {
                if($user->id != \Yii::$app->user->id) {
                    if($user->email == $this->email) {
                        $this->addError($attribute,'Ваш email должен быть уникаьным');
                    }
                }
            }
        }
    }

    public function confirmPassword($attribute,$params) {
        if(!$this->hasErrors()) {
            $user = $this->getUser();
            if(!$user || !($user->validatePassword($this->password))) {
                $this->addError($attribute,'Ваш пароль неверный');
            }
        }
    }

    public function getUser() {
        return User::findOne(\Yii::$app->user->id);
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Введите ваш email',
            'password' => 'Введите ваш пароль',
            'confirm_password' => 'Введите новый пароль',
            'first_name' => 'Введите своё имя',
            'second_name' => 'Введите свою фамилию',
            'city' => 'Введите свой город',
            'age' => 'Введите свой возраст',
            'phone' => 'Введите свой номер телефона',
            'about' => 'Напишите про себя',
            'img' => 'Загрузите свою фотографию'
        ];
    }

    public function edit() {
        $user = User::findOne(\Yii::$app->user->id);

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
        }
        $user->setPassword($this->confirm_password);
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