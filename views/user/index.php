<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>


<section class="profile">
    <div class="container">
        <h2><?=$user->first_name.' '.$user->second_name?></h2>
        <div class="row">
            <div class="col-sm-4">
                <div class="img-wrapp">
                    <?=Html::img('@web/images/users/'.$user->img,[
                            'class' => 'img-animated'
                    ])?>
<!--                    <img src="img/user1.jpg" alt="" class="img-animated">-->
                </div>
            </div>
            <div class="col-sm-8">
                <h5>Основная информация</h5>
                <div class="info">
                    <div class="info-row">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="left">Город:</div>
                            </div>
                            <div class="col-sm-9">
                                <div class="right"><?=$user->city?></div>
                            </div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="left">Возраст:</div>
                            </div>
                            <div class="col-sm-9">
                                <div class="right"><?=$user->age?></div>
                            </div>
                        </div>
                    </div>


                    <div class="info-row">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="left">Моб. телефон:</div>
                            </div>
                            <div class="col-sm-9">
                                <div class="right"><?=$user->phone?></div>
                            </div>
                        </div>
                    </div>

                    <div class="info-row">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="left">О себе:</div>
                            </div>
                            <div class="col-sm-9">
                                <div class="right">
                                    <?=$user->about?>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <?if($user->id == Yii::$app->user->id):?>
        <div class="edit">
            <div class="row">
                <div class="col">
                    <a href="<?=\yii\helpers\Url::to(['user/edit'])?>">
                        <button type="button" class="btn btn-outline-info">Редактировать страницу</button>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?$form = \yii\widgets\ActiveForm::begin();?>
                    <input type="hidden" name="deleteUser" value="<?=$user->id?>">
                    <button type="submit" class="btn btn-outline-danger">Удалить страницу</button>
                    <?$form = \yii\widgets\ActiveForm::end();?>
                </div>
            </div>


        </div>
        <?endif;?>
    </div>
</section>