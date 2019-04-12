<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

    <?php $form = ActiveForm::begin(); ?>

    <div class="div col-md-6"><?= $form->field($model, 'date_end')->widget(DateTimePicker::classname(), [
            'options' => ['placeholder' => 'Необходимо выполнить до...'],
            'pluginOptions' => [
                'autoclose' => true
            ]
        ]); ?>

    </div>
    <div class="div col-md-6">    <?= $form->field($model, 'priority')->dropDownList(['1'=>'Высокий','2'=>'Средний','3'=>'Низкий']) ?>

    </div>
    <div class="div col-md-12">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    </div>

    <div class="col-md-12">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
