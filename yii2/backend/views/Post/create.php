<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\post */

$this->title = 'Добавить лекцию';
$this->params['breadcrumbs'][] = ['label' => 'Лекции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        <div class="box-tools pull-right"></div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <?= $this->render('_form', [
            'model' => $model,
            'lessonFilter'=>$lessonFilter,
            'tagFilter'=>$tagFilter,
        ]) ?>
    </div>
</div>
