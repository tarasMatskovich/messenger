<?php
/**
 * Created by PhpStorm.
 * User: matsk
 * Date: 20.05.2018
 * Time: 16:25
 */

namespace app\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;


class AppController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login','signup'],
                        'roles' => ['?']
                    ]
                ],
            ],
        ];
    }


    protected function setMetaTags($title = null, $keywords = null, $description = null) {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name'=>'keywords','content'=>"$keywords"]);
        $this->view->registerMetaTag(['name'=>'description','content'=>"$description"]);
    }
}