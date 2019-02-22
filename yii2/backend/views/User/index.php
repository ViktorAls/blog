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
                        'template' => '{admin}{update}{delete}',
                        'buttons' => [
                            'admin' => function () {
                                return Html::a('<i class="fas fa-lock"></i>');
                            }
                        ]
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
