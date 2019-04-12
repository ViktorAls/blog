<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?= Html::encode($this->title) ?></h3>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>

        <div class="form-group">
            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
        </div>
        <div class="form-group help">
            <?= $form->field($model, 'password')->passwordInput() ?>
        </div>
        <div class="form-group">
            <div class="main-checkbox">
                <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить меня !') ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton('Авторизация', ['class' => 'btn btn-default', 'name' => 'login-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>