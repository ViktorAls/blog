<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="top">
<?php $this->beginBody() ?>


<!-- pageheader
================================================== -->
<section class="s-pageheader s-pageheader--home">

    <header class="header">
        <div class="header__content row">
            <div class="header__logo">
                <a class="logo" href="<?= \yii\helpers\Url::home(true) ?>">
                    <?= Yii::$app->name ?>
                </a>
            </div>
            <?php if ($this->beginCache('connection', ['duration' => 3600])): ?>
                <?= \common\widgets\Connection::widget() ?>
                <?php $this->endCache(); ?>
            <?php endif; ?>

            <a class="header__search-trigger" href="#0"></a>
            <div class="header__search">
                <form role="search" method="get" class="header__search-form" action="#">
                    <label>
                        <span class="hide-content">Искать урок:</span>
                        <input type="search" class="search-field" placeholder="Введите ключ для поиска" value=""
                               name="search"
                               title="Search for:" autocomplete="off">
                    </label>
                    <input type="submit" class="search-submit" value="Search">
                </form>
                <a href="#0" title="Close Search" class="header__overlay-close">Закрыть</a>
            </div>
            <a class="header__toggle-menu" href="#0" title="Menu"><span>Меню</span></a>
            <nav class="header__nav-wrap">
                <h2 class="header__nav-heading h6">Навигация</h2>
                <ul class="header__nav">
                    <li class="current"><a href="<?=\yii\helpers\Url::home(true)?>" title="">Главная</a></li>
                    <li class="has-children">
                        <a href="#" title="">Категории</a>
                        <ul class="sub-menu">
                            <li><a href="<?=\yii\helpers\Url::to(['document/index'])?>" title="">Документы</a></li>
                            <li><a href="<?=\yii\helpers\Url::to(['posts/audio-lecture'])?>">Аудио лекции</a></li>
                            <li><a href="<?=\yii\helpers\Url::to(['posts/lecture'])?>">Лекция</a></li>
                        </ul>
                    </li>
                    <li><a href="<?=\yii\helpers\Url::to(['site/about'])?>" title="">О себе</a></li>
                    <li><a href="<?=\yii\helpers\Url::to(['site/contact'])?>" title="">Обратная связь</a></li>
                    <?php if (Yii::$app->user->isGuest): ?>
                        <li><a href="<?= \yii\helpers\Url::to(['site/login']) ?>" title="">Вход</a></li>
                    <?php else: ?>
                        <li class="has-children">
                            <a href="#" title="">Профиль</a>
                            <ul class="sub-menu">
                                <li><a href="<?= Url::to(['document/index']) ?>" title="">Тесты</a></li>
                                <li><a href="<?= Url::to(['posts/audio-lecture']) ?>">Результаты тестов</a></li>
                                <li><a href="<?= Url::to(['posts/lecture']) ?>">Настройки профиля</a></li>
                                <li><?= Html::a('Выход', Url::to(['site/logout']), ['data-method' => 'POST'])?></li>​
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul> <!-- end header__nav -->
                <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>
            </nav>
        </div> <!-- header-content -->
    </header>

    <?= \common\widgets\Selected::widget() ?>
</section> <!-- end s-pageheader -->


<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<?= Alert::widget() ?>
<?= $content ?>


<!--Популярные-->
<section class="s-extra">

    <div class="row top">

        <div class="col-eight md-six tab-full popular">
            <h3>Мне повезёт</h3>

            <div class="block-1-2 block-m-full popular__posts">
                <?= \common\widgets\RandPost::widget(); ?>
            </div> <!-- end popular_posts -->
        </div> <!-- end popular -->

        <div class="col-four md-six tab-full about">
            <?php if ($this->beginCache('about', ['duration' => 3600 * 12])): ?>

                <?= \common\widgets\PointOfView::widget(['title' => 'Моя точка зрения']); ?>

                <?= \common\widgets\Connection::widget(['ulClass' => 'about__social']) ?>

                <?php $this->endCache(); ?>
            <?php endif; ?>

        </div>

    </div>

    <div class="row bottom tags-wrap">
        <div class="col-full tags">
            <h3>Последние теги</h3>

            <div class="tagcloud">
                <?= \common\widgets\Tags::widget(); ?>
            </div> <!-- end tagcloud -->
        </div> <!-- end tags -->
    </div> <!-- end tags-wrap -->

</section>

<!--Низ сайта-->
<footer class="s-footer">

    <div class="s-footer__bottom">
        <div class="row">
            <div class="col-full">
                <div class="s-footer__copyright">
                    <span>© Copyright Philosophy 2018</span>
                    <span>Site Template by <a href="https://colorlib.com/">Colorlib</a></span>
                </div>

                <div class="go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top"></a>
                </div>
            </div>
        </div>
    </div> <!-- end s-footer__bottom -->

</footer> <!-- end s-footer -->


<!-- При обновлении страници
================================================== -->
<div id="preloader">
    <div id="loader">
        <div class="line-scale">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>


<?php $this->endBody() ?>
<!--Настройки пагинации-->
<script>

    $(window).on('load', function () {
        $('li.pgn__prev')
            .find('a.pgn__num')
            .removeClass()
            .addClass('pgn__prev');
        $('li.current')
            .removeClass()
            .find('a.pgn__num')
            .replaceWith(function (index, oldHTML) {
                return $("<span>")
                    .html(oldHTML)
                    .addClass('pgn__num current');
            });
        $('li.pgn__next')
            .find('a.pgn__num')
            .removeClass()
            .addClass('pgn__next');
    })
</script>
<!--Конец настроек-->
</body>
</html>
<?php $this->endPage() ?>


<style>
    html{
        border-color: rgb(160,160,255)
        color: ;
    }
</style>



