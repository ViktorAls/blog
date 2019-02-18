<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

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

    <?= \common\widgets\Header::widget(['logoName' => Yii::$app->name]) ?>

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
                <?php if ($this->beginCache('radnPost', ['duration' => 3600 * 2])): ?>
                    <?= \common\widgets\RandPost::widget(); ?>
                    <?php $this->endCache(); ?>
                <?php endif; ?>
            </div> <!-- end popular_posts -->
        </div> <!-- end popular -->

        <div class="col-four md-six tab-full about">

            <?= \common\widgets\PointOfView::widget(['title' => 'Моя точка зрения']); ?>

            <?= \common\widgets\Connection::widget(['ulClass' => 'about__social']) ?>

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
<div id="modal-info" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" style="height: 0;     margin-top: 6px;" data-dismiss="modal"
                        aria-hidden="true">×
                </button>
                <h4 class="modal-title">Настройки профиля</h4>
            </div>
            <div class="modal-body">
                <img src="/images/load.gif" class="modal-body_img" alt="">

            </div>

        </div>
    </div>
</div>
<!--Конец модального окна-->
<?php $this->registerJs("
$('.modalAjaxProfile').on('click',function(){
$('#modal-info').modal('show');
$('#modal-info').find('.modal-body').load('" . Url::to('/user/settings') . "');
})"); ?>
<?php $this->endBody() ?>

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
    html {
        border-color: rgb(160, 160, 255)
        color: ;
    }
</style>



