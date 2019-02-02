<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Сброс пароля';
?>
<div class="row">
    <div class="col-md-6 col-sm-8 col-lg-6 col-xs-12 col-md-offset-3 col-sm-offset-2 col-lg-offset-3">
        <h1 style=";"><?= Html::encode($this->title) ?></h1>

        <p>Пожалуйста, выберите новый пароль:</p>

        <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

        <?= $form->field($model, 'password')->passwordInput(['autofocus' => true, 'class' => 'full-width']) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary btn-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
