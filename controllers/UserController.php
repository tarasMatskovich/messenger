<?php

namespace app\controllers;
use app\models\DeleteUser;
use Yii;
use app\models\User;
use app\models\Edit;
use yii\web\HttpException;
use yii\web\UploadedFile;

class UserController extends AppController
{
    public function deleteUser($id) {
        $user = User::findOne($id);
        if($user) {
            $user->delete();
            Yii::$app->user->logout();
            return true;
        } else {
            return false;
        }
    }
    public function actionIndex($id = NULL)
    {
        if($id) {
            if(Yii::$app->request->isPost) {
                if($this->deleteUser(Yii::$app->request->post('deleteUser'))) {
                    Yii::$app->session->setFlash('success','Страница успешно удалена');
                    return $this->goHome();
                } else {
                    throw new HttpException(404 ,'Такого пользователя нет');
                }
            }
            $user = $this->getUser($id);
            if(!$user)
                throw new HttpException(404 ,'Такой страницы нет');
            return $this->render('index',[
                'user' => $user,
                'tmpModel' => new DeleteUser(),
            ]);
        } else {
            throw new HttpException(404 ,'Такой страницы нет');
        }

    }

    public function actionEdit() {
        $user = $this->getUser(Yii::$app->user->id);
        $model = new Edit();
        $model->attributes = $user->attributes;
        $model->password = NULL;
        if(Yii::$app->request->isPost) {
            $model->attributes = Yii::$app->request->post('Edit');
            if($model->validate() && $model->edit()) {
                Yii::$app->session->setFlash('success','Даные успешно сохранились');
                return $this->goHome();
            }
        }
        return $this->render('edit',[
            'model' => $model,
            'user' => $user,
        ]);
    }




    public function getUser($id) {
        $user = User::findOne($id);
        return $user;
    }

}
