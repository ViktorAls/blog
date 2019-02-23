<?php

use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\document */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6">
        <?= $form->field($model, 'name')->textInput() ?>
        <?= $form->field($model, 'file')->widget(FileInput::classname(), [
            'resizeImages' => true,
            'pluginOptions' => [
                'initialPreviewAsData' => true,
                'overwriteInitial' => false,
                'initialPreviewConfig' => 'Файл приложения',
                'hideThumbnailContent'=>true,
                'showPreview' => true,
                'showCaption' => true,
                'showRemove' => false,
                'showUpload' => false,
                'dropZoneTitle' => '',
            ],
        ]); ?>

    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'id_lesson')->dropDownList($lessonFilter) ?>
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
        <?= $form->field($model, 'tags_arr')->widget(Select2::classname(), [
            'data' => $tagFilter,
            'options' => ['placeholder' => 'Выбирите теги...', 'multiple' => true],
            'pluginOptions' => [
                'tokenSeparators' => [',', ' '],
                'maximumInputLength' => 10,
                'allowClear' => true
            ],
        ])->label('Теги'); ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-block']) ?>

    </div>


    <?php ActiveForm::end(); ?>

</div>
