<?php

namespace app\controllers;

use app\models\Login;
use app\models\SignUp;
use Yii;



class IndexController extends AppController
{
    public function actionLogin() {
        if(!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $login_model = new Login();
        if(Yii::$app->request->post('Login')) {
            $login_model->attributes = Yii::$app->request->post('Login');
            if($login_model->validate()) {
                $u = $login_model->getUser();
                $u->generateAuthKey();
                $u->save();
                Yii::$app->user->login($login_model->getUser(),$login_model->rememberMe ? (3600 * 24 * 30) : 0);
                return $this->goHome();
            }
        }
        return $this->render('login',[
            'login_model' => $login_model
        ]);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionSignup() {
        $signup_model = new SignUp();

        if(Yii::$app->request->isPost) {
            $signup_model->attributes = Yii::$app->request->post('SignUp');
            if($signup_model->validate() && $signup_model->signup()) {
                return $this->goHome();
            }
        }

        return $this->render('signup',[
            'signup_model' => $signup_model
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->goHome();
    }

}
