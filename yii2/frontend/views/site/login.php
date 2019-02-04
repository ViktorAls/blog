<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
?>
<div class="row">
    <div class="col-md-6 col-sm-8 col-lg-6 col-xs-12 col-md-offset-3 col-sm-offset-2 col-lg-offset-3">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Пожалуйста, заполните следующие поля для входа:</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'full-width'])->label('Email') ?>

        <?= $form->field($model, 'password')->passwordInput(['class' => 'full-width'])->label('Пароль') ?>

        <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'full-width'])->label('Запомнить меня') ?>

        <div style="color:#999;margin:1em 0">
            Если вы забыли свой пароль, вы можете <?= Html::a('сбросить его', ['site/request-password-reset']) ?>.
        </div>

        <div class="form-group">
            <?= Html::submitButton('Авторизация', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
