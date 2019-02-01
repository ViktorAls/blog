<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Обратная связь';
?>


<section class="s-content s-content--narrow">

    <div class="row">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                Обратная связь.
            </h1>
        </div> <!-- end s-content__header -->

        <div class="col-full s-content__main">

            <p class="lead">Lorem ipsum Deserunt est dolore Ut Excepteur nulla occaecat magna occaecat Excepteur nisi
                esse veniam dolor consectetur minim qui nisi esse deserunt commodo ea enim ullamco non voluptate
                consectetur minim aliquip Ut incididunt amet ut cupidatat.</p>

            <p>Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi
                est eu exercitation incididunt adipisicing veniam velit id fugiat enim mollit amet anim veniam dolor
                dolor irure velit commodo cillum sit nulla ullamco magna amet magna cupidatat qui labore cillum sit in
                tempor veniam consequat non laborum adipisicing aliqua ea nisi sint ut quis proident ullamco ut dolore
                culpa occaecat ut laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat
                fugiat in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.
            </p>

            <div class="row">
                <div class="col-six tab-full">
                    <h3>Где нас найти</h3>

                    <p>
                        1600 Amphitheatre Parkway<br>
                        Mountain View, CA<br>
                        94043 US
                    </p>

                </div>

                <div class="col-six tab-full">
                    <h3>Контактная информация</h3>

                    <p>contact@philosophywebsite.com<br>
                        info@philosophywebsite.com <br>
                        Phone: (+1) 123 456
                    </p>

                </div>
            </div> <!-- end row -->

            <h3>Скажи привет.</h3>

            <?php $form = ActiveForm::begin(['id' => 'cForm', 'options' => ['name' => 'cForm', '']]); ?>
            <fieldset>
                <div class="form-field">
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'class' => 'full-width']) ?>
                </div>
                <div class="form-field">

                    <?= $form->field($model, 'email')->textInput(['class' => 'full-width']) ?>
                </div>

                <div class="form-field">

                    <?= $form->field($model, 'subject')->textInput(['class' => 'full-width']) ?>
                </div>


                <div class="message form-field">
                    <?= $form->field($model, 'body')->textarea(['rows' => 6, 'class' => 'full-width']) ?>
                </div>

                <div class="form-field">
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '
                            <div class="row">
                            <div class="col-md-2">{image}</div>
                            <div class="col-md-10">{input}</div>
                            </div>
                            ',
                        'options' => ['class'=>'full-width'],
                        'imageOptions' => ['class'=>'rrrr'],
                        ]);?>
                </div>
                <?= Html::submitButton('Отправить', ['class' => 'submit btn btn--primary full-width']) ?>
            </fieldset>

            <?php ActiveForm::end(); ?>


        </div> <!-- end s-content__main -->

    </div> <!-- end row -->

</section> <!-- s-content -->

