<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
?>
<section class="all-messages">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Диалоги</h2>
            </div>
        </div>
        <?foreach($dialogs as $dialog):?>
            <div class="message d-flex">
                <div class="row">
                    <div class="col-3">
                        <div class="img-wrapp">
                            <a href="<?=Url::to(['user/index','id'=>$user->id])?>">
                                <?=Html::img('@web/images/users/'.$user->img)?>
                            </a>
                        </div>
                    </div>
                    <div class="col-9">
                        <a href="<?=Url::to(['user/index','id'=>$dialog['recipient']->id])?>" class="first-name"><?=$dialog['recipient']->first_name.' '.$dialog['recipient']->second_name?></a>
                        <div class="msg-info align-self-end">
                            <div class="row">
                                <div class="col-2">
                                    <div class="img-inner-wrapp">
                                        <a href="<?=Url::to(['user/index','id'=>$dialog['recipient']->id])?>">
                                            <?=Html::img('@web/images/users/'.$dialog['recipient']->img)?>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <a class="msg-text" href="<?=Url::to(['message/show','id'=>$dialog['id']])?>">
                                        <?=$dialog['lastMessage']->text?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>
        <?endforeach;?>

    </div>
</section>
