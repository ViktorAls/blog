<?php
$this->title = $model['title'];

use yii\helpers\Html;
use yii\helpers\Url; ?>
<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article class="row format-audio format-gallery ">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                <?=$model['title'];?>
            </h1>
            <ul class="s-content__header-meta">
                <li class="date"><?= date('F d, Y', $model['updated_at']) ?></li>
            </ul>
        </div>

        <?php if ($model['type'] != 2): ?>
            <?= \common\widgets\PhotoPost::widget(['data'=>$model['file'],'icon'=>$model['icon']]);?>
        <? elseif ($model['type'] == 2): ?>
            <?= \common\widgets\AudioPost::widget(['data'=>$model['file'], 'icon'=>$model['icon']]) ?>
        <? endif; ?>

        <div class="col-full s-content__main">
            <?=$model['description'];?>


            <p class="s-content__tags">
                <span>Теги новостей</span>

                <span class="s-content__tag-list">
                       <?php foreach ($model['tags'] as $tag):?>
                       <?=Html::a($tag['name'],Url::to(['posts/tags','id'=>$tag['id_tag']]))?>
                    <?php endforeach;?>
                </span>
            </p>


        </div>

    </article>

</section>

