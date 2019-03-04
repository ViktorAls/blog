<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var array $contact;
 *
 */
/* @var $model \frontend\models\ContactForm */

use kartik\editable\Editable;
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

            <p class="lead">
                <?php if (Yii::$app->user->identity->success === 1):?>
                    <?= Editable::widget([
                        'name'=>'information',
                        'value'=>$contact['mainFeedback']['value'],
                        'bsColCssPrefixes'=>Editable::SIZE_X_LARGE,
                        'pjaxContainerId'=>'p0',
                        'inputType' => Editable::INPUT_TEXTAREA,
                        'formOptions'=>[
                            'action' => [\yii\helpers\Url::to(['site/information','type'=>'ajax','id'=>$contact['mainFeedback']['id']])]
                        ],
                        'asPopover' => true,
                        'editableButtonOptions'=>['label'=>'<i class="fas fa-pen"></i>'],// значек редактирования
                        'format' => Editable::FORMAT_BUTTON,// редактирвоание по стоке или кнопки
                        'preHeader'=>' ',// иконка когда редактируем
                        'header' => 'Изменить: '.$contact['mainFeedback']['name'],
                        'size'=>'2',
                        'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']]);
                    ?>
                <?else:?>
                    <?=$contact['mainFeedback']['value']?>
                <?endif;?>
            </p>
            <p>
                <?php if (Yii::$app->user->identity->success === 1):?>
                    <?= Editable::widget([
                        'name'=>'information',
                        'value'=>$contact['feedback']['value'],
                        'bsColCssPrefixes'=>Editable::SIZE_X_LARGE,
                        'pjaxContainerId'=>'p0',
                        'inputType' => Editable::INPUT_TEXTAREA,
                        'formOptions'=>[
                            'action' => [\yii\helpers\Url::to(['site/information','type'=>'ajax','id'=>$contact['feedback']['id']])]
                        ],
                        'asPopover' => true,
                        'editableButtonOptions'=>['label'=>'<i class="fas fa-pen"></i>'],// значек редактирования
                        'format' => Editable::FORMAT_BUTTON,// редактирвоание по стоке или кнопки
                        'preHeader'=>' ',// иконка когда редактируем
                        'header' => 'Изменить: '.$contact['feedback']['name'],
                        'size'=>'2',
                        'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']]);
                    ?>
                <?else:?>
                    <?=$contact['feedback']['value']?>
                <?endif;?>
            </p>

            <div class="row">
                <div class="col-six tab-full">
                    <h3>Где нас найти</h3>
                    <p>
                        <?php if (Yii::$app->user->identity->success === 1):?>
                            <?= Editable::widget([
                                'name'=>'information',
                                'value'=>$contact['address']['value'],
                                'bsColCssPrefixes'=>Editable::SIZE_X_LARGE,
                                'pjaxContainerId'=>'p0',
                                'inputType' => Editable::INPUT_TEXTAREA,
                                'formOptions'=>[
                                    'action' => [\yii\helpers\Url::to(['site/information','type'=>'ajax','id'=>$contact['address']['id']])]
                                ],
                                'asPopover' => true,
                                'editableButtonOptions'=>['label'=>'<i class="fas fa-pen"></i>'],// значек редактирования
                                'format' => Editable::FORMAT_BUTTON,// редактирвоание по стоке или кнопки
                                'preHeader'=>' ',// иконка когда редактируем
                                'header' => 'Изменить: '.$contact['address']['name'],
                                'size'=>'2',
                                'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']]);
                            ?>
                        <?else:?>
                            <?=$contact['feedback']['value']?>
                        <?endif;?>
                    </p>                </div>

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

