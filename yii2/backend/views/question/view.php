<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\question */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Вопросы', 'url' => ['index', 'test' => $model->id_test]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="fas fa-pen-alt"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

            <?= Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>

        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    [
                        'attribute' => 'id_test',
                        'format' => 'text',
                        'value' => function ($model) {
                            return $model->test['title'];
                        },
                        'contentOptions' => ['style' => 'width: 5%; '],
                    ],
                    'title:ntext',
                    [
                        'attribute' => 'icon',
                        'format' => 'html',
                        'value' => function ($model) {
                            return Html::img(yii::getAlias("@iconTestUrl/$model->icon"), ['style' => 'max-height: 350px']);
                        },
                    ],
                    [
                        'label' => 'Варианты ответов',
                        'format' => 'html',
                        'value' => function ($model) {
                            $answer = null;
                            foreach ($model->answers as $key => $answers) {
                                $answer .= ++$key.'. '.$answers['title'].' - ';
                                $answer .= $answers['bool']===1?'Верный':'Не верный';
                                $answer .= '<br>';
                            }
                            return $answer;
                        }
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>

