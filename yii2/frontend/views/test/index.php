<?php
$this->title ='Тесты | '.$searchParams;
?>

<section class="s-content">

    <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <h1>Тесты</h1>

            <p class="lead">Сейчас вы находитесь в разделе "Тесты". Вы можете осуществить поиск, кликнув в
                правом верхнем углу слово "Search". <br> Параметры для поиска: <?= $searchParams ?></p>
        </div>
    </div>
    <div class="grid-sizer"></div>
    <?php if (!empty($tests)): ?>
        <?php foreach ($tests as $test): ?>
            <article class="ilia" data-aos="fade-up">
                <div class="ilia_card">
                    <div class="ilia_card-info text-center">
                        <h2><?= $test['title'] ?></h2>
                    </div>
                    <p><?= $test['description'] ?></p>
                </div>
                <div class="inf">
                    <div class="date">
                        <div class="entry__date">
                            <div><p>Доступен с: <strong><?= $test['begin_date'] ?></strong></p></div>
                            <div><p>Доступен по: <strong><?= $test['end_date'] ?></strong></p></div>
                        </div>
                        <div class="btn_donov">
                            <a class="btn_donov-click" href=''>Проходить</a>
                        </div>
                    </div>
                </div>
                <div class="tage_gl">
                <span class="tage"><span class="tage_document">Предмет</span>
                    <a href="<?= \yii\helpers\Url::current(['lesson' => $test['id_lesson']]) ?>"><?= $test['lesson']['name'] ?></a>
                </span>
                </div>
            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="row">

            <p>Тестов, по вашему запросу, не найдено.</p>
        </div>
    <?php endif; ?>

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
