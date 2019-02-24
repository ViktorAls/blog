<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\testSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление тестами';
$this->params['breadcrumbs'][] = $this->title;
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
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'title',
                    'description:ntext',
                    [
                        'attribute' => 'id_lesson',
                        'value' => function ($model) {
                            return $model->lesson['name'];
                        }
                    ],
                    'date',
                    'begin_date',
                    'end_date',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{question}{update}{view}{delete}',
                        'buttons' => [
                            'question' => function ($url, $model) {
                                return Html::a('<i class="fas fa-question"></i>',
                                    \yii\helpers\Url::to(['question/index', 'test' => $model->id],
                                        ['title' => 'Вопросы к тесту']
                                    )
                                );
                            }
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>
