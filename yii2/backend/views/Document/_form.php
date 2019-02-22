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

<div class="document-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'file')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'resizeImages'=>true,
        'pluginOptions' => [
            'initialPreviewAsData'=>true,
            'overwriteInitial'=>false,
            'initialPreviewConfig'=>'Файл приложения',
            'showPreview' => true,
            'showCaption' =>true,
            'showRemove' => false,
            'showUpload' => false,
            'dropZoneTitle'=>'',
        ],
    ]);?>

    <?=$form->field($model, 'tags_arr')->widget(Select2::classname(), [
        'data'=>ArrayHelper::map(\common\models\Tag::find()->asArray()->all(),'id','name'),
        'options' => ['placeholder' => 'Выбирите теги...', 'multiple' => true],
        'pluginOptions' => [
            'tokenSeparators' => [',', ' '],
            'maximumInputLength' => 10,
            'allowClear' => true
        ],
    ])->label('Теги новости');?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'id_lesson')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
