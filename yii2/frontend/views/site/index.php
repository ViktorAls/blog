<? $this->title = 'Главная страница';

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>


<section class="s-content">

    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>
            <!--           Начало Новостей-->
            <? foreach ($posts as $key => $post): ?>
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
                                <a href="<?= \yii\helpers\Url::to(['posts/lesson', 'id' => $post['id_post']]) ?>"><?= date('F d, Y', $post['updated_at']) ?></a>
                            </div>
                            <h1 class="entry__title"><a
                                        href="<?= \yii\helpers\Url::to(['posts/lesson', 'id' => $post['id_post']]) ?>"><?= html::encode($post['title']) ?></a>
                            </h1>

                        </div>
                        <div class="entry__excerpt">
                            <p>
                                <?= mb_strimwidth(html::encode($post['description']), 0, 150, "..."); ?>
                            </p>
                        </div>
                        <div class="entry__meta">
                            <span class="entry__meta-links">
                                <?php foreach ($post['tags'] as $tag): ?>
                                    <?= Html::a(html::encode($tag['name']), Url::to(['post/tag', 'id' => $tag['id_tag']])); ?>
                                <?php endforeach; ?>
                            </span>
                        </div>
                    </div>
                </article>
            <? endforeach; ?>
            <!--            Конец новостей-->
        </div>
    </div>

    <!--    Пагинация-->
    <div class="row">
        <div class="col-full">
            <nav class="pgn">
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
                    // Css for each options. Links
                    'linkOptions' => ['class' => 'pgn__num'],
                    'disabledPageCssClass' => 'disabled',
                    // Customzing CSS class for navigating link
                    'prevPageCssClass' => 'pgn__prev',
                    'nextPageCssClass' => 'pgn__next',
                ]);
                ?>
            </nav>
        </div>
    </div>
    <!--    Конец пагинации-->
</section>
