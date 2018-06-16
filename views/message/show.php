<section class="user-message">
    <div class="container">
        <div class="controls">
            <div class="row">
                <div class="col-2">
                    <a href="#" class="back">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="<?=\yii\helpers\Url::to(['message/index'])?>" class="back sm-hide">Назад</a>
                </div>
                <div class="col-8">
                    <div class="info">
                        <a href="#"><?=$recipient->first_name.' '.$recipient->second_name?></a><br>
                        <p>
                            был в сети сегодня в 1:29
                        </p>
                    </div>
                </div>
                <div class="col-2">
                    <div class="dop-info">
                        <i class="fas fa-ellipsis-h more-msg-info">
                        </i>
                        <div class="sub-menu" id="show-more-info-msg">
                            <ul>
                                <li>
                                    <a href="#">Очистить историю сообщений</a>
                                </li>
                            </ul>
                        </div>
                        <a href="#" class="img sm-hide">
                            <?=\yii\helpers\Html::img('@web/images/users/'.$recipient->img)?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <?foreach ($messages as $message):?>
            <?if($message->sender_id === Yii::$app->user->id):?>
                <div class="msg-info">
                    <div class="row">
                        <div class="col-md-1 col-2">
                            <div class="img-wrapp">
                                <a href="#">
                                    <?=\yii\helpers\Html::img('@web/images/users/'.$user->img)?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-7 col-7">
                            <div class="msg">
                                <?=$message->text?>
                            </div>
                        </div>
                        <div class="col-md-4 col-3">
                            <div class="date">
                                <?=$message->date?>
                            </div>
                        </div>
                    </div>
                </div>
            <?else:?>
                <div class="msg-info">
                    <div class="row justify-content-end">
                        <div class="col-md-4 col-3">
                            <div class="date text-right">
                                <?=$message->date?>
                            </div>
                        </div>
                        <div class="col-md-7 col-7">
                            <div class="msg answer">
                                <?=$message->text?>
                            </div>
                        </div>
                        <div class="col-md-1 col-2">
                            <div class="img-wrapp">
                                <a href="#">
                                    <?=\yii\helpers\Html::img('@web/images/users/'.$recipient->img)?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?endif;?>
        <?endforeach;?>
<!--        <div class="msg-info">-->
<!--            <div class="row">-->
<!--                <div class="col-md-1 col-2">-->
<!--                    <div class="img-wrapp">-->
<!--                        <a href="#">-->
<!--                            <img src="img/user2.jpg" alt="">-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-7 col-7">-->
<!--                    <div class="msg">-->
<!--                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus aliquid, aliquam architecto dicta explicabo, iste eum doloremque libero, et voluptate commodi. Quas sit deserunt suscipit odit maiores aperiam esse!-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-4 col-3">-->
<!--                    <div class="date">-->
<!--                        22:45-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="msg-info">-->
<!--            <div class="row justify-content-end">-->
<!--                <div class="col-md-4 col-3">-->
<!--                    <div class="date text-right">-->
<!--                        13:19-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-7 col-7">-->
<!--                    <div class="msg answer">-->
<!--                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores harum, nulla numquam delectus. Minus, commodi, pariatur. Eius cumque, ducimus aliquid iusto quidem earum, nisi iste. Recusandae quos magnam perferendis velit!-->
<!--                        Nulla culpa harum voluptates non itaque et provident impedit in totam quia, magni sit odit laboriosam autem, nobis reiciendis quod consectetur dolor rem aliquam praesentium modi, voluptatem eligendi magnam possimus.-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-1 col-2">-->
<!--                    <div class="img-wrapp">-->
<!--                        <a href="#">-->
<!--                            <img src="img/user1.jpg" alt="">-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="msg-info">-->
<!--            <div class="row">-->
<!--                <div class="col-md-1 col-2">-->
<!--                    <div class="img-wrapp">-->
<!--                        <a href="#">-->
<!--                            <img src="img/user2.jpg" alt="">-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-7 col-7">-->
<!--                    <div class="msg">-->
<!--                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus aliquid, aliquam architecto dicta explicabo, iste eum doloremque libero, et voluptate commodi. Quas sit deserunt suscipit odit maiores aperiam esse!-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-4 col-3">-->
<!--                    <div class="date">-->
<!--                        22:45-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="msg-info">-->
<!--            <div class="row justify-content-end">-->
<!--                <div class="col-md-4 col-3">-->
<!--                    <div class="date text-right">-->
<!--                        13:19-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-7 col-7">-->
<!--                    <div class="msg answer">-->
<!--                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores harum, nulla numquam delectus. Minus, commodi, pariatur. Eius cumque, ducimus aliquid iusto quidem earum, nisi iste. Recusandae quos magnam perferendis velit!-->
<!--                        Nulla culpa harum voluptates non itaque et provident impedit in totam quia, magni sit odit laboriosam autem, nobis reiciendis quod consectetur dolor rem aliquam praesentium modi, voluptatem eligendi magnam possimus.-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-1 col-2">-->
<!--                    <div class="img-wrapp">-->
<!--                        <a href="#">-->
<!--                            <img src="img/user1.jpg" alt="">-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="msg-info">-->
<!--            <div class="row">-->
<!--                <div class="col-md-1 col-2">-->
<!--                    <div class="img-wrapp">-->
<!--                        <a href="#">-->
<!--                            <img src="img/user2.jpg" alt="">-->
<!--                        </a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-7 col-7">-->
<!--                    <div class="msg">-->
<!--                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus aliquid, aliquam architecto dicta explicabo, iste eum doloremque libero, et voluptate commodi. Quas sit deserunt suscipit odit maiores aperiam esse!-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-md-4 col-3">-->
<!--                    <div class="date">-->
<!--                        22:45-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->


        <div class="send-message">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="form-group">
                        <textarea name="" id="" class="form-control" placeholder="Напишите сообщение..."></textarea>
                    </div>
                </div>
            </div>

        </div>
        <input type="hidden" value="<?=$room->id?>">
        <div id="status"></div>
    </div>
</section>