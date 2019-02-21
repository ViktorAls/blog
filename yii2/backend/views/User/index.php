<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользвователи';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Управление пользователями</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <?php Pjax::begin(); ?>

            <p>
                <?= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

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
                        'template' => '{update}{delete}'
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
