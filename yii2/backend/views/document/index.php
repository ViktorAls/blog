<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/**
 * @var array $lessonFilter ;
 */

$this->title = 'Документы';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Управление документами</h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="far fa-plus-square"></i>', ['create']) ?>
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
                    'name:ntext',
                    [
                        'attribute' => 'id_lesson',
                        'value' => function ($model) {
                            return $model->lesson['name'];
                        },
                        'filter' => $lessonFilter,
                    ],
                    'description:html',
                    'href:ntext:Название файла на сервере',
                    [
                        'label' => 'Теги',
                        'value' => function ($model) {
                            $name = array_column($model->tags, 'name');
                            return implode(', ',$name);
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>

