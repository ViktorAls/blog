<?php

/**
 * @var bool $connectionWidget
 * @var string $urlLogo
 * @var string $logoName
 * @var string $liDocument
 * @var string $liAudioLecture
 * @var string $liLecture
 */
$search = Yii::$app->search->SearchAction(Yii::$app->controller->route);

use yii\helpers\Html;
use yii\helpers\Url;

?>

<header class="header">
    <div class="header__content row">
        <div class="header__logo">
            <a class="logo" href="<?= $urlLogo ?>">
                <?= $logoName ?>
            </a>
        </div>
        <?php if ($connectionWidget === true): ?>
                <?= \common\widgets\Connection::widget() ?>
        <?php endif; ?>

        <a class="header__search-trigger" href="#0"></a>
        <div class="header__search">
            <?php $form = \yii\widgets\ActiveForm::begin([
                'method' => 'get',
                'action' => [$search['action']],
                'options' => ['role' => 'search', 'class' => 'header__search-form']
            ]) ?>
            <label>
                <span class="hide-content"><?= $search['message'] ?>:</span>
                <input type="search" class="search-field" placeholder="Введите ключ для поиска" value=""
                       name="search" title="Поиск..." autocomplete="off">
            </label>
            <input type="submit" class="search-submit" value="Search">
            <?php $form = \yii\widgets\ActiveForm::end() ?>
            <a href="#0" title="Закрыть поиск" class="header__overlay-close">Закрыть</a>
        </div>
        <a class="header__toggle-menu" href="#0" title="Menu"><span>Меню</span></a>
        <nav class="header__nav-wrap">
            <h2 class="header__nav-heading h6">Навигация</h2>
            <ul class="header__nav">
                <li class="current"><a href="<?= \yii\helpers\Url::home(true) ?>" title="">Главная</a></li>
                <li class="has-children">
                    <a href="#" title="">Лекции</a>
                    <ul class="sub-menu">
                        <li class="has-children">
                            <a href="#" title="">Аудио лекции</a>
                            <ul class="sub-menu">
                                <?=$liAudioLecture?>
                                <li><a href="<?= \yii\helpers\Url::to(['posts/audio-lecture']) ?>" title="">Все аудио лекции</a></li>
                            </ul>
                        </li>
                        <li class="has-children">
                            <a href="#" title="">Лекции</a>
                            <ul class="sub-menu">
                                <?=$liLecture?>
                                <li><a href="<?= \yii\helpers\Url::to(['posts/lecture']) ?>" title="">Все лекции</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-children">
                    <a href="#" title="">Документы</a>
                    <ul class="sub-menu">
                        <?= $liDocument ?>
                        <li><a href="<?= \yii\helpers\Url::to(['document/index']) ?>" title="">Все документы</a></li>
                    </ul>
                </li>
                <li><a href="<?= \yii\helpers\Url::to(['site/about']) ?>" title="">О себе</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['site/contact']) ?>" title="">Обратная связь</a></li>
                <?php if (Yii::$app->user->isGuest): ?>
                    <li><a href="<?= \yii\helpers\Url::to(['site/login']) ?>" title="">Вход</a></li>
                <?php else: ?>
                    <li class="has-children">
                        <a href="#" title="">Профиль</a>
                        <ul class="sub-menu">
                            <li><a href="<?= \yii\helpers\Url::to(['document/index']) ?>" title="">Тесты</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['posts/audio-lecture']) ?>">Результаты тестов</a>
                            </li>
                            <li><a href="#" class="modalAjaxProfile">Настройки профиля</a></li>
                            <li><?= Html::a('Выход', Url::to(['site/logout']), ['data-method' => 'POST']); ?>​</li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul> <!-- end header__nav -->
            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Закрыть</a>
        </nav>
    </div> <!-- header-content -->
</header>
