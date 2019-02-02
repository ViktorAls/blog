<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Запросить сброс пароля';
?>
<div class="row">
    <div class="col-md-6 col-sm-8 col-lg-6 col-xs-12 col-md-offset-3 col-sm-offset-2 col-lg-offset-3">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Пожалуйста, заполните вашу электронную почту. Ссылка для сброса пароля будет отправлена ​​туда.</p>

        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'full-width']) ?>

        <div class="form-group">
            <?= Html::submitButton('Получить', ['class' => 'btn btn-primary btn-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
