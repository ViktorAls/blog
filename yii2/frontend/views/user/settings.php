<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<style>
    .icon-profil img{
        display: block;
        width: 100%;
        height: 270px;
        object-fit:scale-down;
    }
</style>
<div class="row">
    <div class="col-md-7">
        <div class="col-md-12 text-center"><b><?=$user['middlename']?> <?=$user['name']?> <?=$user['patronymic']?></b></div>
        <div class="col-md-12">
            <div class="icon-profil">
            <?=Html::img(\yii\helpers\Url::home(true).'/uploads/user/'.$user['icon'])?>
            </div>
        </div>
        <div class="col-md-6"><b>Группа:</b> <?=$user['group']['name']?></div>
    </div>
    <div class="col-md-5">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'file')->widget(FileInput::classname(), [
            'options' => ['accept' => 'image/*'],
            'resizeImages' => true,
            'pluginOptions' => [
                'browseClass' => 'btn btn-primary btn-block' ,
                'initialPreviewAsData' => true,
                'overwriteInitial' => false,
                'initialPreviewConfig' => 'Аватарка пользователя',
                'showPreview' => true,
                'showCaption' => false,
                'showRemove' => false,
                'showUpload' => false,
                'dropZoneTitle' => '',
            ],
        ])->label('Аватарка'); ?>
        <?=\yii\helpers\Html::submitButton('Изменить фотографию',['class'=>'btn-block btn-mini'])?>
        <?php $form = ActiveForm::end(); ?>
    </div>
</div>

