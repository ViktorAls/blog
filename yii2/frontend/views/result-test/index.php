<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\resultTestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Результаты тестов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                   'attribute' =>'id_test',
                'value'=>function($model){
                     return $model->test['title'];
                },
                'filter' => $filterTest,
                'filterInputOptions' => ['class'=>'full-width'],
            ],
            'date',
            'result',
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
