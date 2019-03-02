<?php

use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-8">
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
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
    <?= $form->field($model, 'id_lesson')->dropDownList($lessonFilter) ?>
    <?= $form->field($model, 'tags_arr')->widget(Select2::classname(), [
        'data' => $tagFilter,
        'options' => ['placeholder' => 'Выбирите теги...', 'multiple' => true],
        'pluginOptions' => [
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10,
            'allowClear' => true
        ],
    ])->label('Теги'); ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
            ],
            'resizeImages' => true,
            'pluginOptions' => [
                'initialPreviewAsData' => true,
                'overwriteInitial' => false,
                'initialPreview'=>$model->imageLink,
                'initialPreviewConfig' =>[0=>['caption' => 'Текущая иконка лекции', 'key' => 'id']],
                'showPreview' => true,
                'showCaption' => true,
                'showDelete'=>false,
                'showRemove' => false,
                'showUpload' => false,
                'dropZoneTitle' => '',
            ],
        ]); ?>
    </div>

    <div class="col-md-12">

    <?= $form->field($model, 'files[]')->widget(FileInput::classname(), ['options' => [
        'multiple' => true,
        'accept' => 'image/*',
    ],
        'pluginOptions' => [
            'deleteUrl'=>\yii\helpers\Url::to(['post/delete-img']),
            'initialPreview'=>$model->imagesLinks,
            'initialPreviewAsData'=>true,
            'overwriteInitial'=>false,
            'initialPreviewConfig'=>$model->imagesLinksData,
            'pluginOptions' => [
                'showPreview' => true,
                'showCaption' =>false,
                'showRemove' => false,
                'showUpload' => false,
            ],
            'maxFileCount' => 15
        ]
    ]);
    ?>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-block']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
