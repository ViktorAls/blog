<?php

use kartik\editable\Editable;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Управление тегами новостей';
?>
<div class="tag-index">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Теги к новостям</h3>
                </div>
                <div class="box-body">
                    <?php Pjax::begin(); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel'=>$searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'label'=>'Теги',
                                'content'=>function($model){
                                    return Editable::widget([
                                            'name'=>'tags',
                                        'value'=>$model->name,
                                        'bsColCssPrefixes'=>Editable::SIZE_MEDIUM,
                                        'pjaxContainerId'=>'p0',
                                        'formOptions'=>[
                                            'action' => [\yii\helpers\Url::to(['tags/index','type'=>'ajax','id'=>$model->id])]
                                        ],
                                        'asPopover' => true,
                                        'editableButtonOptions'=>['label'=>'<i class="fas fa-pen"></i>'],// значек редактирования
                                        'format' => Editable::FORMAT_BUTTON,// редактирвоание по стоке или кнопки
                                        'preHeader'=>' ',// иконка когда редактируем
                                        'header' => 'Тег: '.$model->name,
                                        'size'=>'md',
                                        'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']
                                    ]);
                                }
                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{delete}',
                            ],
                        ],
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Добавить тег</h3>
                </div>
                <div class="box-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

