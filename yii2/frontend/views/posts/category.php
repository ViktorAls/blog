<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
$this->title = $category;
?>
<section class="s-content">

    <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <h1>Категория: <?= $category ?></h1>

            <p class="lead">Сейчас вы находитесь в разделе "<?=$category?>". Здесь вы можете осуществить поиск, кликнув в
                правом верхнем углу слово "Search". <br> Текущий запрос для поиска: <?= $params ?>.</p>
        </div>
    </div>

    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>
            <?php if ($posts != null): ?>
                <?php foreach ($posts as $key => $post): ?>
                    <article class="masonry__brick entry format-standard" data-aos="fade-up">

                        <div class="entry__thumb">
                            <a href="<?= \yii\helpers\Url::to(['posts/lesson', 'id' => $post['id_post']]) ?>"
                               class="entry__thumb-link">
                                <img src="<?= \yii\helpers\Url::home(true) . '/uploads/icon/' . $post['icon'] ?>"
                                     srcset="<?= \yii\helpers\Url::home(true) . '/uploads/icon/' . $post['icon'] ?> 1x"
                                     alt="">
                            </a>
                        </div>

                        <div class="entry__text">
                            <div class="entry__header">

                                <div class="entry__date">
                                    <a href="<?= \yii\helpers\Url::to(['posts/lesson', 'id' => $post['id_post']]) ?>">
                                        <?= date('F d, Y', $post['updated_at']) ?>
                                    </a>
                                </div>
                                <h1 class="entry__title">
                                    <a href="<?= \yii\helpers\Url::to(['posts/lesson', 'id' => $post['id_post']]) ?>">
                                        <?= Html::encode($post['title']) ?>
                                    </a>
                                </h1>

                            </div>
                            <div class="entry__excerpt">
                                <p>
                                    <?= mb_strimwidth(Html::encode($post['description']), 0, 150, "..."); ?>
                                </p>
                            </div>
                            <div class="entry__meta">
                            <span class="entry__meta-links">
                                <?php foreach ($post['tags'] as $tag): ?>
                                    <?= Html::a(Html::encode($tag['name']), Url::to(['posts/tags', 'search' => $tag['name']])); ?>
                                <?php endforeach; ?>
                            </span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else: ?>
                <div>
                    <p>Записей, по вашему параметру, не найдено.</p>
                </div>
            <?php endif; ?>
        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->

    <!--    Пагинация-->
    <div class="row">
        <div class="col-full">
            <nav class="pgn">
                <?php \yii\widgets\Pjax::begin(['timeout' => 100000, 'clientOptions' => ['container' => 'pjax-container']]); ?>

                <?= LinkPager::widget([
                    'pagination' => $pages,
                    //Css option for container
                    'options' => ['class' => ''],
                    //First option value
                    //Previous option value
                    'prevPageLabel' => '&nbsp;',
                    //Next option value
                    'nextPageLabel' => '&nbsp;',
                    //Current Active option value
                    'activePageCssClass' => 'current',
                    //Max count of allowed options
                    'maxButtonCount' => 8,
                    'linkContainerOptions' => ['class' => ''],
//                     Css for each options. Links
                    'linkOptions' => ['class' => 'pgn__num'],
                    'disabledPageCssClass' => 'disabled',
                    // Customzing CSS class for navigating link
                    'prevPageCssClass' => 'pgn__prev',
                    'nextPageCssClass' => 'pgn__next',
                ]);
                ?>
                <?php \yii\widgets\Pjax::end(); ?>

            </nav>
        </div>
    </div>
    <!--    Конец пагинации-->

</section> <!-- s-content -->
