<?php

use kartik\editable\Editable;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LessonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление группами учащихся';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="tag-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Настройки страниц и значений</h3>
                </div>
                    <div class=" box-body table-responsive">

                    <?php Pjax::begin(); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'tableOptions' => [
                            'class' => 'table table-striped table-bordered'
                        ],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'name',
                            [
                                'label'=>'Значение',
                                'attribute' => 'value',
                                'content'=>function($model){
                                    return Editable::widget([
                                        'name'=>'information',
                                        'value'=>$model->value,
                                        'pjaxContainerId'=>'p0',
                                        'inputType'=>Editable::INPUT_TEXTAREA,
                                        'formOptions'=>[
                                            'action' => [\yii\helpers\Url::to(['information/update','type'=>'ajax','id'=>$model->id])]
                                        ],
                                        'asPopover' => true,
                                        'editableButtonOptions'=>['label'=>'<i class="fas fa-pen"></i>'],// значек редактирования
                                        'format' => Editable::FORMAT_BUTTON,// редактирвоание по стоке или кнопки
                                        'preHeader'=>' ',// иконка когда редактируем
                                        'header' => 'Значение: '.$model->value,
                                        'size'=>'2',
                                        'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']
                                    ]);
                                }
                            ],
                            'comment'
                        ],
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

