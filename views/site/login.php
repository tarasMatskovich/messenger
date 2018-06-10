<?
use yii\widgets\ActiveForm;
?>


<section class="login">
    <div class="container">
        <h2>Войдите, чтобы начать пользоваться MyMessenger</h2>
        <p style="text-align: center;">
            <a href="sign_up.html">У меня ещё нет аккаунта</a>
        </p>
        <div class="row justify-content-center">
            <div class="col-8">
                <? $form = ActiveForm::begin();?>

                <?=$form->field($login_model,'email')->textInput(['placeholder'=>'Введите email'])?>

                <?=$form->field($login_model,'password')->passwordInput(['placeholder' => 'Введите пароль'])?>

                <button type="submit" class="btn btn-success">Войти</button>

                <? $form = ActiveForm::end();?>
<!--                <form>-->
<!--                    <div class="form-group">-->
<!--                        <label for="email">Ваш email</label>-->
<!--                        <input type="email" class="form-control" id="email" placeholder="Введите email">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="password">Ваш пароль</label>-->
<!--                        <input type="password" class="form-control" id="password" placeholder="Введите пароль">-->
<!--                    </div>-->
<!--                    <div class="form-group form-check">-->
<!--                        <input type="checkbox" class="form-check-input" id="remember">-->
<!--                        <label class="form-check-label" for="remember">Запомнить меня</label>-->
<!--                    </div>-->
<!---->
<!--                </form>-->
            </div>
        </div>
    </div>
</section>