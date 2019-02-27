<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Управление лекциями';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="far fa-plus-square"></i>', ['create']) ?>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">

            <?php Pjax::begin() ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'options' => ['class' => ''],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'title',
                    'description:html',
                    [
                        'attribute' => 'id_lesson',
                        'value' => function ($model) {
                            return $model->lesson['name'];
                        },
                        'filter' => $lessonFilter,
                    ],
                    [
                        'attribute' => 'type',
                        'value' => function ($model) {
                            return $model->type===2 ? 'Аудио лекция' : 'Лекция';
                        },
                        'filter' => [1=>'Лекции',2=>'Аудио лекции'],

                    ],
                    [
                        'attribute' => 'icon',
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::img(yii::getAlias("@iconUrl/$model->icon"), ['style' => 'max-height: 150px']);
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
