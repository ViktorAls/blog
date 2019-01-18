<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
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
<!-- pageheader
  ================================================== -->
<div class="s-pageheader">

    <header class="header">
        <div class="header__content row">
            <div class="header__logo">
                <a class="logo" href="<?= \yii\helpers\Url::home(true) ?>">
                    <?= Yii::$app->name ?>
                </a>
            </div>
            <?php if ($this->beginCache('connection', ['duration' => 3600 * 12])): ?>
                <?= \common\widgets\Connection::widget() ?>
                <?php $this->endCache(); ?>
            <?php endif; ?>
            <a class="header__search-trigger" href="#0"></a>
            <div class="header__search">
                <form role="search" method="get" class="header__search-form" action="#">
                    <label>
                        <span class="hide-content">Искать урок:</span>
                        <input type="search" class="search-field" placeholder="Введите ключ для поиска" value=""
                               name="s" title="Search for:" autocomplete="off">
                    </label>
                    <input type="submit" class="search-submit" value="Search">
                </form>
                <a href="#0" title="Close Search" class="header__overlay-close">Close</a>
            </div>
            <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
            <nav class="header__nav-wrap">
                <h2 class="header__nav-heading h6">Навигация</h2>
                <ul class="header__nav">
                    <li class="current"><a href="index.html" title="">Главная</a></li>
                    <li class="has-children">
                        <a href="#" title="">Уроки</a>
                        <ul class="sub-menu">
                            <li><a href="category.html">Видео уроки</a></li>
                            <li><a href="category.html">Аудио уроки</a></li>
                            <li><a href="category.html">Лекции</a></li>
                        </ul>
                    </li>
                    <li><a href="style-guide.html" title="">Документы</a></li>
                    <li><a href="style-guide.html" title="">Тесты</a></li>
                    <li><a href="about.html" title="">О себе</a></li>
                    <li><a href="contact.html" title="">Обратная связь</a></li>
                </ul> <!-- end header__nav -->
                <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>
            </nav>
        </div> <!-- header-content -->
    </header> <!-- header -->

</div> <!-- end s-pageheader -->

<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
<?= Alert::widget() ?>
<?= $content ?>


<!-- s-extra
================================================== -->
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


        </div> <!-- end about -->

    </div> <!-- end row -->

    <div class="row bottom tags-wrap">
        <div class="col-full tags">
            <h3>Последние теги</h3>

            <div class="tagcloud">
                <?= \common\widgets\Tags::widget(); ?>
            </div> <!-- end tagcloud -->
        </div> <!-- end tags -->
    </div> <!-- end tags-wrap -->

</section>


<!-- s-footer
================================================== -->
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


<!-- preloader
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
</body>
</html>
<?php $this->endPage() ?>







