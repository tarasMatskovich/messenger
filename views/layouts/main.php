<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!--    <link rel="stylesheet" href="css/style.css">-->
    <!-- Bootstrap CSS -->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<section class="container menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="<?=Url::home()?>">MyMessenger</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?=Url::home()?>">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=Url::to(['messages/index'])?>">Сообщения</a>
                </li>
                <?if(!Yii::$app->user->isGuest):?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=Url::to(['user/index','id'=>Yii::$app->user->id])?>">Мой профиль</a>
                </li>
                <? endif; ?>
                <?if(Yii::$app->user->isGuest):?>
                <li class="nav-item">
                    <a class="nav-link" href="<?=Url::to(['index/login'])?>">Войти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=Url::to(['index/signup'])?>">Зарегистрироваться</a>
                </li>
                <? else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(['index/logout'])?>">Выйти</a>
                    </li>
                <? endif; ?>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Искать</button>
            </form>
        </div>
    </nav>
</section>

<? if(Yii::$app->session->getFlash('success')):?>
    <div class="msg-alert">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="alert alert-success" role="alert">
                        <?=Yii::$app->session->getFlash('success')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? endif;?>

<?= $content ?>


<footer>
    <div class="container">
        <div class="footer-wrapp">
            <div class="row">
                <div class="col-md-8">
                    <ul>
                        <li>
                            <a href="#">
                                Главная
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Сообщения
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Мой профиль
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <p>&copy; Copyright 2018</p>
                </div>
            </div>
        </div>
    </div>
</footer>







<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

