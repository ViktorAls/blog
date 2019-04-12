<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\task */

$this->title = 'Добавить новую задачу';
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-danger">
    <div class="box-header with-border">
        <p class="box-title" style="font-size: 1em"><?= Html::encode($this->title) ?></p>
    </div>
    <div class="box-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>

