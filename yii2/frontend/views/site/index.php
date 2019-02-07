<?php $this->title = 'Главная страница';

/**
 * @var array $posts
 */

use yii\widgets\LinkPager;

?>

<section class="s-content">
    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>
            <!--           Начало Новостей-->
            <?php foreach ($posts as $key => $post): ?>
                <?= common\widgets\ArticlePost::widget([
                    'title' => $post['title'],
                    'description' => $post['description'],
                    'idPost' => $post['id_post'],
                    'nameIcon' => $post['icon'],
                    'datePublication' => $post['created_at'],
                    'tags' => $post['tags'],
                ]); ?>
            <?php endforeach; ?>
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
//                     Css for each options. Links
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
