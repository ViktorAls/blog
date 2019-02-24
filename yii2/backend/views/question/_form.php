<?php

use kartik\file\FileInput;
use unclead\multipleinput\MultipleInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-8">
        <?= $form->field($model, 'title')->textarea()->label('Вопрос') ?>
        <?= $form->field($model, 'id_test')->dropDownList($testFilter) ?>
        <?php echo $form->field($model, 'answer')->widget(MultipleInput::className(), [
            'max' => 12,
            'min' => 1,
            'columns' => [
                [
                    'name' => 'title',
                    'title' => 'Вариант ответа',
                ],
                [
                    'name' => 'bool',
                    'type' => 'checkbox',
                    'title' => 'Правильность',
                ],
            ]

        ])->label(''); ?>

    </div>
    <div class="col-md-4">

        <?= $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
            ],
            'resizeImages' => true,
            'pluginOptions' => [
                'initialPreviewAsData' => true,
                'overwrirteInitial' => false,
                'initialPreview' => $model->imageLink,
                'initialPreviewConfig' => [0 => ['caption' => 'Картинка к вопросу', 'key' => 'id']],
                'showPreview' => true,
                'showCaption' => true,
                'showDelete' => false,
                'showRemove' => false,
                'showUpload' => false,
                'dropZoneTitle' => '',
            ],
        ])->label('Прикреплённый файл'); ?>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
