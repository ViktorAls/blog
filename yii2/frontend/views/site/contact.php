<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\ContactForm */

use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

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

            <p class="lead"><?= $contact['mainFeedback']['value'] ?></p>

            <p><?= $contact['feedback']['value'] ?></p>

            <div class="row">
                <div class="col-six tab-full">
                    <h3>Где нас найти</h3>
                    <p><?= $contact['address']['value'] ?></p>
                </div>

                <div class="col-six tab-full">
                    <h3>Контактная информация</h3>

                     <?= \common\widgets\Connection::widget(['ulClass' => 'about__social']) ?>
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
                        'options' => ['class' => 'full-width'],
                        'imageOptions' => ['class' => 'rrrr'],
                    ]); ?>
                </div>
                <?= Html::submitButton('Отправить', ['class' => 'submit btn btn--primary full-width']) ?>
            </fieldset>

            <?php ActiveForm::end(); ?>


        </div> <!-- end s-content__main -->

    </div> <!-- end row -->

</section> <!-- s-content -->

