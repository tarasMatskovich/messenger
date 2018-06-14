<?php

namespace app\controllers;

use app\models\Login;
use app\models\SignUp;
use Yii;
use app\models\User;
use yii\data\Pagination;



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
        $query = $this->getUsersQuery();
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => '3'
        ]);
        // приводим параметры в ссылке к ЧПУ
        $pages->pageSizeParam = false;
        $users = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index',[
            'users' => $users,
            'pages' => $pages
        ]);
    }

    public function getUsersQuery() {
        $users = User::find();
        return $users;
    }

    public function actionSignup() {
        $signup_model = new SignUp();

        if(Yii::$app->request->isPost) {
            $signup_model->attributes = Yii::$app->request->post('SignUp');
            if($signup_model->validate() && $signup_model->signup()) {
                Yii::$app->session->setFlash('success','Вы успешно зарегистрировались');
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
