<?php

use kartik\editable\Editable;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LessonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление предметами';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="tag-index">
    <div class="row">
        <div class="col-md-8">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Предметы</h3>
                </div>
                <div class="box-body">
                    <?php Pjax::begin(); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'label'=>'Предметы',
                                'attribute' => 'name',
                                'content'=>function($model){
                                    return Editable::widget([
                                        'name'=>'lesson',
                                        'value'=>$model->name,
                                        'bsColCssPrefixes'=>Editable::SIZE_MEDIUM,
                                        'pjaxContainerId'=>'p0',
                                        'formOptions'=>[
                                            'action' => [\yii\helpers\Url::to(['lesson/update','type'=>'ajax','id'=>$model->id])]
                                        ],
                                        'asPopover' => true,
                                        'editableButtonOptions'=>['label'=>'<i class="fas fa-pen"></i>'],// значек редактирования
                                        'format' => Editable::FORMAT_BUTTON,// редактирвоание по стоке или кнопки
                                        'preHeader'=>' ',// иконка когда редактируем
                                        'header' => 'Предмет: '.$model->name,
                                        'size'=>'2',
                                        'options' => ['class'=>'form-control', 'placeholder'=>'Enter person name...']
                                    ]);
                                }
                            ],

                            [
                                    'class' => 'yii\grid\ActionColumn',
                                'template' => '{delete}',
                                'buttons' => [
                                    'delete' => function($url,$model) {
                                        $options = array_merge([
                                            'title' => Yii::t('yii', 'Delete'),
                                            'aria-label' => Yii::t('yii', 'Delete'),
                                            'data-confirm' => 'При удалении этого предмета будут удалены все связанные с ним записи, уверены что хотите удалить его ?',
                                            'data-method' => 'post',
                                            'data-pjax' => '0',
                                        ]);
                                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, $options);
                                    }
                                ]
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
                    <h3 class="box-title">Добавить предмет</h3>
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

