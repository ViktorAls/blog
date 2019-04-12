<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\JqueryAsset;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Задачи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Высокий приоритет</a></li>
            <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Средний приоритет</a></li>
            <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="true">Низкий приоритет</a></li>
            <li class="">
                <a href="<?=Url::to('/task/create')?>"> <i class="fas fa-plus"></i> Добавить новую задачу.</a>
            </li>
            <li id="reder">

            </li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="col-md-12">
                    <?php foreach ($tasks1 as $task1): ?>
                        <div class="col-md-4">
                            <div class="box box-danger">
                                <div class="box-header with-border">
                                    <p class="box-title" style="font-size: 1em"><b><?= $task1['title'] ?></b></p>
                                    <div class="box-tools pull-right">
                                        <a href="<?=Url::to(['task/update','id'=>$task1['id']])?>" class="btn btn-box-tool">
                                            <i class="fas fa-pencil-alt"></i></a>
                                        <a href="" class="btn btn-box-tool" data-widget="collapse">
                                            <i class="fa fa-minus"></i></a>
                                        <a href="" class="btn btn-box-tool" data-widget="remove" date-method="post"
                                           onclick='$.post("<?= Url::to(['task/delete','id'=>$task1['id']])?>",{id:"<?=$task1['id']?>"})
                                                   .fail(function() {alert( "error" );});'>
                                            <i class="fa fa-times"></i></a>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <?= $task1['description'] ?>
                                </div>
                                <div class="box-footer">
                                    <p><b>Создана:</b> <?= $task1['date_begin'] ?></p>
                                    <p><b>Выполнить:</b> <?= $task1['date_end'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="tab-pane" id="tab_2">
                <?php foreach ($tasks2 as $task2): ?>
                    <div class="col-md-4">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <p class="box-title" style="font-size: 1em"><b><?= $task2['title'] ?></b></p>
                                <div class="box-tools pull-right">
                                    <a href="<?=Url::to(['/task/update','id'=>$task2['id']])?>" class="btn btn-box-tool">
                                        <i class="fas fa-pencil-alt"></i></a>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                    <a href="" class="btn btn-box-tool" data-widget="remove" date-method="post"
                                       onclick='$.post("<?= Url::to(['/task/delete','id'=>$task2['id']])?>",{id:"<?=$task2['id']?>"})
                                               .fail(function() {alert( "error" );});'>
                                        <i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <div class="box-body">
                                <?= $task2['description'] ?>
                            </div>
                            <div class="box-footer">
                                <p><b>Создана:</b> <?= $task2['date_begin'] ?></p>
                                <p><b>Выполнить:</b> <?= $task2['date_end'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="tab-pane" id="tab_3">
                <?php foreach ($tasks3 as $task3): ?>
                    <div class="col-md-4">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <p class="box-title" style="font-size: 1em"><b><?= $task3['title'] ?></b></p>
                                <div class="box-tools pull-right">
                                    <a href="<?=Url::to(['/task/update','id'=>$task3['id']])?>" class="btn btn-box-tool">
                                        <i class="fas fa-pencil-alt"></i></a>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i></button>
                                    <a href="" class="btn btn-box-tool" data-widget="remove" date-method="post"
                                       onclick='$.post("<?= Url::to(['/task/delete','id'=>$task3['id']])?>",{id:"<?=$task3['id']?>"})
                                               .fail(function() {alert( "error" );});'>
                                        <i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <div class="box-body">
                                <?= $task3['description'] ?>
                            </div>
                            <div class="box-footer">
                                <p><b>Создана:</b> <?= $task3['date_begin'] ?></p>
                                <p><b>Выполнить:</b> <?= $task3['date_end'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
