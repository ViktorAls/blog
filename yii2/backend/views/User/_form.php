<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\user */
/* @var $form yii\widgets\ActiveForm */
/**
 * @var array $groupFilter
 */
?>

<div class="row">
    <?php $form = ActiveForm::begin(); ?>

    <div class="col-md-4">
        <?= $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'success')->dropDownList([0 => 'Учащийся', 1 => 'Администратор']) ?>
        <?php if ($model->isNewRecord): ?>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
        <?php endif; ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'id_group')->dropDownList($groupFilter) ?>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Изменить', ['class' => 'btn btn-success btn-block']) ?>
        </div>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

