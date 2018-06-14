<?
use yii\widgets\ActiveForm;
?>
<section class="login edit">
    <div class="container">
        <h2>Редактирование страницы</h2>
        <div class="row justify-content-center">
            <div class="col-8">
                <? $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']])?>

                <?=$form->field($model,'email')->textInput(['placeholder'=>'Ваш email'])?>

                <?=$form->field($model,'first_name')->textInput(['placeholder'=>'Ваше имя'])?>

                <?=$form->field($model,'second_name')->textInput(['placeholder'=>'Ваша фамилия'])?>

                <?=$form->field($model,'city')->textInput(['placeholder'=>'Ваш город'])?>

                <?=$form->field($model,'phone')->textInput(['type'=>'number','placeholder'=>'Ваш номер телефона'])?>

                <?=$form->field($model,'about')->textarea(['placeholder'=>'О себе','rows' => 10])?>

                <?= $form->field($model,'age')->dropDownList([
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

                <div class="img-wrapp">
                    <?=\yii\helpers\Html::img('@web/images/users/'.$user->img,[
                            'class' => 'change-img',
                            'id' => 'img-preview',
                    ])?>
                </div>



                <?= $form->field($model, 'img')->fileInput([
                        'id' => 'img2',
                        'accept' => 'image/*'
                ]) ?>

                <button id="reset-img-preview" type="button" class="btn btn-outline-danger">Удалить изображение</button>


                <?=$form->field($model,'password')->passwordInput(['placeholder'=>'Ваш пароль'])?>

                <?=$form->field($model,'confirm_password')->passwordInput(['placeholder'=>'Ваш новый пароль'])?>

                <button type="submit" class="btn btn-success">Редактировать страницу</button>


                <? $form = ActiveForm::end()?>

            </div>
        </div>
    </div>
</section>