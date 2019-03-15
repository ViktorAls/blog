<?php

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var array $test
 * @var array $questions
 */
?>
<?php
$this->title = $test['title'];
$this->params['breadcrumbs'][] = ['label' => 'Тесты', 'url' => '/tests/index'];// управление переходом
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .title_test {
        font-size: 31px;
    }

    .margin_left {
        margin-left: 20px;
        font-size: 17px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .opacity {
        opacity: .7;
    }
</style>
<div class="container">
    <div class="row"></div>
    <div class="col-md-12">
        <h3 class="title_test"><?= html::encode($test['title']) ?></h3>
        <p class="opacity"><?= html::encode($test['description']) ?></p>
        <hr>
    </div>

    <?= Html::beginForm(['test/result', 'id' => $test['id']], 'post', ['class' => "form-inline"]); ?>
    <div class="col-md-12">
        <?php foreach ($questions as $key => $question): ?>
            <? if (!empty($question['answers'])): ?>
                <div class="row">

                    <p class="margin_left"><?= $key+1 . '. '.Html::encode($question['title']) ?></p>
                    <?php if (is_file(yii::getAlias('@testIcon/') . $question['icon'])): ?>
                    <div class="col-md-6">
                            <?= Html::img(Url::home(true) . '/uploads/testIcon/' . $question['icon'],
                                ['style' => 'width:100%;hight:auto; margin-bottom:25px']); ?>
                    </div>
                    <?php endif; ?>
                    <?php shuffle($question['answers']); ?>
                    <div class="col-md-6">
                        <?php foreach ($question['answers'] as $answer): ?>
                            <div class="check">
                                <?= Html::checkbox('answer['.$question['id'].']['.$answer['id'].']', false) ?> <?= $answer['title'] ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <hr>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <br>
    <?= Html::submitButton('Ответить', ['class' => 'btn btn-lg btn-primary btn-block btn-md', 'name' => 'buttonAnswer', 'value' => 'otvet']) ?>
    <?= Html::endForm() ?>
</div>
<br>
