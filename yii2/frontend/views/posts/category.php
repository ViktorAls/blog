<?php

/**
 * @var string $category
 * @var array $posts
 * @var Pagination $pages
 * @var string $section
 */

use yii\data\Pagination;
$this->title = $category;
?>
<section class="s-content">

    <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <h1>Раздел: <?= $section ?></h1>

            <p class="lead">Сейчас вы находитесь в разделе "<?=$section?>". Вы можете осуществить поиск, кликнув в
                правом верхнем углу слово "Search". <br> Текущий запрос для поиска: <?= $category ?>.</p>
        </div>
    </div>

    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $key => $post): ?>
                    <?= common\widgets\ArticlePost::widget([
                        'title'=>$post['title'],
                        'description' => $post['description'],
                        'idPost' => $post['id'],
                        'nameIcon'=>$post['icon'],
                        'datePublication'=>$post['created_at'],
                        'tags'=>$post['tags'],
                    ]);  ?>
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
                <?= yii\widgets\LinkPager::widget([
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

</section> <!-- s-content -->
