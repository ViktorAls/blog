<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
    <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'form-horizontal']); ?>

    <span class="heading" ><?= Html::encode($this->title) ?></span>

    <div class="form-group">
        <?= $form->field($model, 'email')->textInput(['autofocus' => true,'autocomplete'=>'email','class' => 'form-control', 'id' => 'inputEmail']) ?>
        <i class="fa fa-user"></i>
    </div>
    <div class="form-group help">
        <?= $form->field($model, 'password')->passwordInput(['id' => 'inputPassword','autocomplete'=>'password', 'class' => 'form-control']) ?>
        <i class="fa fa-lock"></i>
        <a href="#" class="fa fa-question-circle"></a>
    </div>
    <div class="form-group">
        <div class="main-checkbox">
            <?= $form->field($model, 'rememberMe')->checkbox(['id' => 'checkbox1']) ?>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-default', 'name' => 'login-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

