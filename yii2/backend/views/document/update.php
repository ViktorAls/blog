<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\document */

$this->title = 'Обновить документ: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<?php if ($model->href!==null): ?>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Сообщение</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <div>К этому документу прикреплён файл, при повторной загрузки он будет перезаписан.</div>
            </div>
        </div>
    </div>
<?php endif; ?>
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
