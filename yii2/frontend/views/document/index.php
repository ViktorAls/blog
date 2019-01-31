<?php

/**
 * @var string $category
 * @var array $posts
 * @var Pagination $pages
 */

use yii\data\Pagination;
$this->title = $category;
?>
<section class="s-content">

    <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <h1>Документы</h1>

            <p class="lead">Сейчас вы находитесь в разделе "Документы". Здесь вы можете осуществить поиск, кликнув в
                правом верхнем углу слово "Search". <br> Текущий запрос для поиска: <?= $params ?>.</p>
        </div>
    </div>

            <div class="grid-sizer"></div>
            <article class="ilia" data-aos="fade-up">
                <div class="ilia_card">
                    <a href="#" class="copy_link " title="Скопировать ссылку"><i class="fas fa-copy"></i></a>
                    <div class="ilia_card-img visible-md visible-lg hiddenv">
                            <a href="#" ><img src="/images/kek.jpg" alt=""></a>
                    </div>
                    <div class="ilia_card-info">
                        <h2>Далеко-далеко за словесными горами в стране.</h2>

                    </div>
                    <p>Далеко-далеко за словесными горами в стране, гласных и согласных живут рыбные тексты. Большой что предупредила рыбного осталось первую раз большого, напоивший, ручеек, lorem родного путь это проектах!</p>
                </div>
                <div class="inf">
                    <div class="date">
                            <div class="entry__date">
                                <div><p>Дата публикации: <strong>December 15, 2017</strong></p></div>
                                <div><p>Дата изменения: <strong>December 15, 2017</strong></p></div>
                            </div>

                            <div class="btn_donov">
                                <a class="btn_donov-click" href="#0">Скачать</a>
                            </div>
                    </div>

                </div>

                <div class="tage_gl">
                        <span class="tage"><span class="tage_document">Теги документа</span>
                        <a href="#0">orci</a>
                        <a href="#0">lectus</a>
                        <a href="#0">varius</a>
                        <a href="#0">turpis</a>
                        </span>
                </div>

            </article> <!-- end article -->



    <!--    Пагинация-->
    <div class="row">
        <div class="col-full">
            <nav class="pgn">
<!--                --><?//= yii\widgets\LinkPager::widget([
//                    'pagination' => $pages,
//                    //Css option for container
//                    'options' => ['class' => ''],
//                    //First option value
//                    //Previous option value
//                    'prevPageLabel' => '&nbsp;',
//                    //Next option value
//                    'nextPageLabel' => '&nbsp;',
//                    //Current Active option value
//                    'activePageCssClass' => 'current',
//                    //Max count of allowed options
//                    'maxButtonCount' => 8,
//                    'linkContainerOptions' => ['class' => ''],
////                     Css for each options. Links
//                    'linkOptions' => ['class' => 'pgn__num'],
//                    'disabledPageCssClass' => 'disabled',
//                    // Customzing CSS class for navigating link
//                    'prevPageCssClass' => 'pgn__prev',
//                    'nextPageCssClass' => 'pgn__next',
//                ]);
//                ?>
            </nav>
        </div>
    </div>
    <!--    Конец пагинации-->

</section> <!-- s-content -->

