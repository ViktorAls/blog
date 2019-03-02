<?php

use bupy7\flexslider\FlexSlider;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\post */

$this->title = $model['title'];
$this->params['breadcrumbs'][] = ['label' => 'Лекции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<style>
    .img-rounded{
        position: center;
        width: 550px;
    }
</style>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title"><?= Html::encode($this->title)?> - <?=$model['id']?></h3>
        <div class="box-tools pull-right">
            <?= Html::a('<i class="fas fa-pen-alt"></i>', ['update', 'id' => $model['id']], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $model['id']], [
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
        <div class="row">
            <?php if (!empty($images)): ?>
            <div class="col-md-6 col-md-offset-3">
                    <?= \aki\imageslider\ImageSlider::widget([
                        'baseUrl' => Yii::getAlias('@filePostUrl/').$model['id'].'/',
                        'nextPerv' => true,
                        'indicators' => true,
                        'classes' => 'img-rounded',
                        'images' => $images
                        ,
                    ]); ?>
            </div>
            <?php endif; ?>
            <div class="col-md-12" style="margin-top: 30px">
                <div class="col-md-9 col-md-offset-1">
                    <?=$model['description']?>
                    <div class="col-md-4">
                       <b>Добавлен:</b> <?=date('Y-m-d H-m-i',$model['created_at'])?>
                    </div>
                    <div class="col-md-4">
                        <b>Изменён:</b>  <?=date('Y-m-d H-m-i',$model['updated_at'])?>
                    </div>
                    <div class="col-md-4">
                        <b>Предмет:</b> <?=$model['lesson']['name']?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


