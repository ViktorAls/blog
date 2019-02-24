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
                        'label' => 'Вариантов ответов',
                        'format' => 'html',
                        'value' => function ($model) {
                            return count($model->answers);
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
