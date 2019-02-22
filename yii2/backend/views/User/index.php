<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Управление пользователями</h3>
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
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'middlename',
                    'name',
                    'patronymic',
                    [
                        'attribute' => 'success',
                        'value' => function ($model) {
                            return $model->success===0 ? 'Учащийся' : 'Администратор';
                        },
                        'filter' => ['Учащийся', 'Администратор']

                    ],
                    [
                        'attribute' => 'id_group',
                        'value' => function ($model) {
                            return $model->group['name'];
                        },
                        'filter' => $groupFilter,

                    ],
                    'email:email',
                    [
                        'attribute' => 'status',
                        'value' => function ($model) {
                            return $model->status===10 ? 'Одобрен' : 'Новый';
                        },
                        'filter' => [10 => 'Одобрен', 0 => 'Новый']

                    ],

                    ['class' => 'yii\grid\ActionColumn',
                        'template' => '{status} {admin} {update} {delete}',
                        'buttons' => [
                            'admin' => function ($url, $model) {
                                if ($model->success===0) {
                                    return Html::a('<i class="fas fa-lock"></i>', $url, ['title' => 'Разграничить права']);
                                }
                                return Html::a('<i class="fas fa-lock-open"></i>', $url, ['title' => 'Ограничить права']);
                            },
                            'status' => function ($url, $model) {
                                if ($model->status===0) {
                                    return Html::a('<i class="fas fa-plus"></i>', $url, ['title' => 'Одобрать']);
                                }
                                return Html::a('<i class="fas fa-minus"></i>', $url, ['title' => 'Запретить']);
                            }
                        ]
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
