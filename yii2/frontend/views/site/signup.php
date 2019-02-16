<?php

/* @var $this yii\web\View
 * @var $form yii\bootstrap\ActiveForm
 * @var $model \frontend\models\SignupForm
 * @var array $group
 *
 */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-12 text-center">

                <h1><?= Html::encode($this->title) ?></h1>

                <p>Пожалуйста, заполните следующие поля, чтобы зарегистрироваться :</p>
            </div>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <div class="col-md-4">
                <?= $form->field($model, 'name')->textInput()->label('Имя') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'middlename')->textInput()->label('Фамилия') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'patronymic')->textInput()->label('Отчество') ?>
            </div>
            <div class="col-md-12">
                    <?= $form->field($model, 'group')->dropDownList($group,['class'=>'full-width'])->label('Группа'); ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'email') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
            </div>
            <div class="form-group col-md-12">
                <?= Html::submitButton('Регистрация', ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
