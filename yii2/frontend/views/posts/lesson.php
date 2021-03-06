<?php
$this->title = $model['title'];

use yii\helpers\Html;
use yii\helpers\Url;

?>
<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article class="row format-audio format-gallery ">

        <div class="s-content__header col-full">
            <h2 class="s-content__header-title mt-0">
                <?= $model['title']; ?>
            </h2>
            <ul class="s-content__header-meta">
                <li class="date"><?= date('F d, Y', $model['created_at']) ?></li>
            </ul>
        </div>

        <?php if (isset($model['postFiles'])): ?>
                <?= \common\widgets\PhotoPost::widget(['data' => $model['postFiles'], 'idPost' =>$model['id'] , 'icon' => $model['icon']]); ?>
        <?php endif; ?>

        <div class="col-full s-content__main">
            <?= $model['description']; ?>

            <p class="s-content__tags">
                <span>Теги новостей</span>

                <span class="s-content__tag-list">
                       <?php foreach ($model['tags'] as $tag): ?>
                           <?= Html::a($tag['name'], Url::to(['posts/tags', 'tag' => $tag['name']])) ?>
                       <?php endforeach; ?>
                </span>
            </p>

        </div>

    </article>

    <?= \common\widgets\Comment::widget(['comments' => $model['comments']]) ?>

</section>

