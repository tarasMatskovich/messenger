<?
use yii\widgets\ActiveForm;
?>
<section class="login">
    <div class="container">
        <h2>Зарегистрируйтесь, чтобы начать пользоваться MyMessenger</h2>
        <div class="row justify-content-center">
            <div class="col-8">
                <? $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>

                <?=$form->field($signup_model,'email')->textInput(['placeholder'=>'Ваш email'])?>

                <?=$form->field($signup_model,'first_name')->textInput(['placeholder'=>'Ваше имя'])?>

                <?=$form->field($signup_model,'second_name')->textInput(['placeholder'=>'Ваша фамилия'])?>

                <?=$form->field($signup_model,'city')->textInput(['placeholder'=>'Ваш город'])?>

                <?=$form->field($signup_model,'phone')->textInput(['type'=>'number','placeholder'=>'Ваш номер телефона'])?>

                <?=$form->field($signup_model,'about')->textarea(['placeholder'=>'О себе','rows' => 10])?>

                <?= $form->field($signup_model,'age')->dropDownList([
                        '15' => '15',
                        '16' => '16',
                        '17' => '17',
                        '18' => '18',
                        '19' => '19',
                        '20' => '20',
                        '21' => '21',
                        '22' => '22',
                        '23' => '23',
                ],['promt' => 'Ваш возраст'])?>


                <?= $form->field($signup_model, 'img')->fileInput() ?>


                <?=$form->field($signup_model,'password')->passwordInput(['placeholder'=>'Ваш пароль'])?>

                <?=$form->field($signup_model,'confirm_password')->passwordInput(['placeholder'=>'Ваш пароль повторно'])?>

                <button type="submit" class="btn btn-success">Зарегистрироваться</button>


                <? $form = ActiveForm::end()?>
<!--                <form>-->
<!--                    <div class="form-group">-->
<!--                        <label for="email">Введите свой email:</label>-->
<!--                        <input type="email" class="form-control" id="email" placeholder="Введите email">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="firstname">Введите своё имя:</label>-->
<!--                        <input type="text" class="form-control" id="firstname" placeholder="Введите имя">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="secondname">Введите свою фамилию:</label>-->
<!--                        <input type="text" class="form-control" id="secondname" placeholder="Введите фамилию">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="city">Введите свой город:</label>-->
<!--                        <input type="text" class="form-control" id="city" placeholder="Введите город">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="age">Сколько вам лет:</label>-->
<!--                        <select class="form-control" id="age">-->
<!--                            <option>15</option>-->
<!--                            <option>16</option>-->
<!--                            <option>17</option>-->
<!--                            <option>18</option>-->
<!--                            <option>19</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="phone">Введите свой мобильный телефон:</label>-->
<!--                        <input type="number" class="form-control" id="phone" placeholder="Введите телефон">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="about">Роскажите о себе:</label>-->
<!--                        <textarea name="" id="about" placeholder="О себе" class="form-control" rows="10"></textarea>-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="img">Загрузите своё изображение:</label>-->
<!--                        <input type="file" class="form-control-file" id="img">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="password">Ваш пароль:</label>-->
<!--                        <input type="password" class="form-control" id="password" placeholder="Введите пароль">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label for="password2">Повторно ваш пароль:</label>-->
<!--                        <input type="password" class="form-control" id="password2" placeholder="Введите пароль">-->
<!--                    </div>-->
<!--                    <div class="form-group form-check">-->
<!--                        <input type="checkbox" class="form-check-input" id="remember">-->
<!--                        <label class="form-check-label" for="remember">Запомнить меня</label>-->
<!--                    </div>-->
<!--                    <button type="submit" class="btn btn-success">Войти</button>-->
<!--                </form>-->
            </div>
        </div>
    </div>
</section>