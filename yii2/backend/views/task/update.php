<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\task */

$this->title = 'Обновить задачу: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Задачи', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="box box-danger">
    <div class="box-header with-border">
        <p class="box-title"><?= Html::encode($this->title) ?></p>
    </div>
    <div class="box-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
