<?
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>

<section class="all-users">
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Все пользователи</h2>
            </div>
        </div>
        <?if(isset($users) && $users):?>
            <?foreach($users as $user):?>
                <div class="user">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="img-wrapp">
                                <a href="<?=Url::to(['user/index','id'=>$user->id])?>">
                                    <?=\yii\helpers\Html::img("@web/images/users/{$user->img}")?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col">
                                    <div class="users-info">
                                        <h5>
                                            <a href="<?=Url::to(['user/index','id'=>$user->id])?>" class="name">
                                                <?= $user->first_name.' '.$user->second_name;?>
                                            </a>
                                        </h5>
                                        <a href="message.html" class="write-msg">Написать сообщение</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <? endforeach; ?>
        <? endif;?>


    </div>
</section>
<?if($pages->getPageCount() > 1):?>
<section class="pagination">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <?if($pages->getPage()+1 > 1):?>
                    <li>
                        <a href="/page/<?=$pages->getPage()+1-1?>">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </li>
                    <?endif;?>

                    <?for($i = 1;$i <= $pages->getPageCount();$i++):?>
                        <li><a href="/page/<?=$i?>"><?=$i?></a></li>
                    <?endfor;?>
                    <?if($pages->getPage()+1 != $pages->getPageCount()):?>
                    <li>
                        <a href="/page/<?=$pages->getPage()+1+1?>">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                    <?endif;?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?endif;?>
