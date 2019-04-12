<?php

use yii\helpers\Url;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    [
                        'label' => 'Лекции',
                        'icon' => 'book',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Лекции', 'icon' => 'clock', 'url' => [Url::to(['/post/index'])]],
                        ],
                    ],
                    [
                        'label' => 'Тесты',
                        'icon' => 'text-width',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Управление', 'icon' => 'clock', 'url' => [Url::to(['/test/index'])]],
                            ['label' => 'Результаты', 'icon' => 'clock', 'url' => [Url::to(['/result/index'])]],
                            ],
                    ],
                    [
                        'label' => ' Задачи',
                        'icon' => 'tasks',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Добавить задачу', 'icon' => 'clock', 'url' => [Url::to(['/task/index'])]],
                        ],
                    ],
                    [
                        'label' => ' Страница значений',
                        'icon' => 'pager',
                        'url' => [Url::to(['/information/index'])],
                    ],
                    [
                        'label' => ' Документы',
                        'icon' => 'passport',
                        'url' => [Url::to(['/document/index'])],
                    ],
                    [
                        'label' => ' Пользователи',
                        'icon' => 'user',
                        'url' => [Url::to(['/user/index'])],
                    ],
                    [
                        'label' => ' Другое ',
                        'icon' => 'network-wired',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Предметы', 'icon' => 'check-circle', 'url' => [Url::to(['/lesson/index'])]],
                            ['label' => 'Группы', 'icon' => 'clock', 'url' => [Url::to(['/group/index'])]],
                            ['label' => 'Теги', 'icon' => 'clock', 'url' => [Url::to(['/tags/index'])]],
                        ],
                    ],

                    ['label' => 'Выход', 'icon' => 'times-circle', 'url' => ['/site/logout'], 'template' => '<a href="{url}" data-method="post">{icon}{label}</a>'],
                ],
            ]
        ) ?>
    </section>
</aside>
