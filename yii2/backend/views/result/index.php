<?php

use common\models\query\GroupQuery;
use common\models\query\TestQuery;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Результаты тестов';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"> <?= Html::encode($this->title) ?></h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'id_test',
                        'value' => function ($model) {
                            return $model['test']['title'];
                        },
                        'filter' => TestQuery::getTest(),
                    ],
                    [
                        'attribute' => 'user',
                        'label' => 'Пользователь',
                        'value' => function ($model) {
                            $user = $model['user'];
                            return $user['middlename'].' '.$user['name'].' '.' '.$user['patronymic'];
                        }
                    ],
                    [
                        'attribute' => 'id_group',
                        'label' => 'Группа',
                        'value' => function ($model) {
                            return $model['user']['group']['name'];
                        },
                        'filter'=> GroupQuery::getGroup(),
                    ],
                    'date',
                    [
                        'attribute' => 'result',
                        'label' => 'Результат (>)',
                        'value' => function ($model) {
                            return $model['result'] . '%';
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{delete}'
                    ],
                ],
            ]) ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
