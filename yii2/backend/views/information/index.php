<?php

use kartik\editable\Editable;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LessonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление группами учащихся';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Настройки информации на страницах</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'options' => ['class' => ''],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label' => 'Значение',
                        'attribute' => 'value',
                        'content' => function ($model) {
                            return Editable::widget([
                                'name' => 'information',
                                'value' => $model->value,
                                'pjaxContainerId' => 'p0',
                                'inputType' => Editable::INPUT_TEXTAREA,
                                'formOptions' => [
                                    'action' => [\yii\helpers\Url::to(['information/update', 'type' => 'ajax', 'id' => $model->id])]
                                ],
                                'asPopover' => true,
                                'editableButtonOptions' => ['label' => '<i class="fas fa-pen"></i>'],// значек редактирования
                                'format' => Editable::FORMAT_BUTTON,// редактирвоание по стоке или кнопки
                                'preHeader' => ' ',// иконка когда редактируем
                                'header' => 'Комментарий:' . $model->comment,
                                'size' => '2',
                                'options' => ['class' => 'form-control', 'placeholder' => 'Enter person name...']
                            ]);
                        },
                        'contentOptions' => ['style' => 'width: 75%; '],
                    ],
                    'comment'
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
        <!-- /.table-responsive -->
    </div>
</div>

