<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\test */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-12">
        <div class="col-md-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'id_lesson')->dropDownList($lessonFilter) ?>
        </div>
    </div>
    <div class="col-md-12">
    <?= $form->field($model, 'description')->widget(\vova07\imperavi\Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'buttonSource' => true,
            'plugins' => [
                'clips',
                'fullscreen',
                'table',
                'fontfamily',
                'fontsize',
                'fontcolor',
            ],
        ],
    ]); ?>
    </div>
    <div class="col-md-12">
        <div class="col-md-6">
            <?=  $form->field($model, 'begin_date')->widget(DateTimePicker::classname(), [
                'options' => ['placeholder' => 'Enter event time ...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'end_date')->widget(DateTimePicker::classname(), [
                'options' => ['placeholder' => 'Enter event time ...'],
                'pluginOptions' => [
                    'autoclose' => true
                ]
            ]);  ?>
        </div>
    </div>
    <div class="col-md-12">
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-block']) ?>
    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
