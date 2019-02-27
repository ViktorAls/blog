<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Вопросы к тесту: $name";
$this->params['breadcrumbs'][] = ['label' => 'Тесты', 'url' => ['test/index']];
$this->params['breadcrumbs'][] = ['label' => $name];


?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"> <?= Html::encode($this->title) ?></h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="far fa-plus-square"></i>', ['create']) ?>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'options' => [''],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'icon',
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::img(yii::getAlias("@iconTestUrl/$model->icon"), ['style' => 'max-height: 150px']);
                        },
                        'contentOptions' => ['style' => 'width: 5%; '],
                    ],
                    'title:ntext',
                    [
                        'label' => 'Ответы',
                        'format' => 'html',
                        'value' => function ($model) {
                            $text = null;
                            foreach ($model->answers as $answer) {
                                $text .= $answer['title'].' - ';
                                $text .= $answer['bool']===1?'Правильный':'Не правильный';
                                $text .='<br>';
                            }
                            return $text;
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
