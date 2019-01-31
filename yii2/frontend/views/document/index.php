<?php

/**
 * @var string $category
 * @var array $posts
 * @var array $documents
 * @var Pagination $pages
 */

use yii\data\Pagination;

$this->title = $searchParams;
?>
<section class="s-content">

    <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <h1>Документы</h1>

            <p class="lead">Сейчас вы находитесь в разделе "Документы". Вы можете осуществить поиск, кликнув в
                правом верхнем углу слово "Search". <br> Параметры для поиска: <?= $searchParams ?></p>
        </div>
    </div>

    <div class="grid-sizer"></div>

    <? if ($documents != null): ?>
        <?php foreach ($documents as $key => $document): ?>
            <?= \common\widgets\articleDocument::widget([
                'title' => $document['name'],
                'description' => $document['description'],
                'fileName' => $document['href'],
                'updated_at' => $document['updated_at'],
                'created_at' => $document['created_at'],
                'tags' => $document['tags'],
            ]); ?>
        <?php endforeach; ?>
    <? endif; ?>
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

