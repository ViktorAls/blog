<aside class="main-sidebar">

    <section class="sidebar">

        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    [
                        'label' => 'Другое',
                        'icon' => 'tasks',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Предметы', 'icon' => 'check-circle', 'url' => [\yii\helpers\Url::to(['lesson/index'])]],
                            ['label' => 'Группы', 'icon' => 'clock', 'url' => [\yii\helpers\Url::to(['group/index'])]],
                            ['label' => 'Теги', 'icon' => 'clock', 'url' => [\yii\helpers\Url::to(['tags/index'])]],
                        ],
                    ],
                    [
                        'label' => 'Лекции',
                        'icon' => 'tasks',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Аудио-лекции', 'icon' => 'check-circle', 'url' => [\yii\helpers\Url::to(['post/index','type'=>1])]],
                            ['label' => 'Лекции', 'icon' => 'clock', 'url' => [\yii\helpers\Url::to(['post/index','type'=>0])]],
                        ],
                    ],
                    [
                        'label' => 'Управление тестами',
                        'icon' => 'tasks',
                        'url' => [\yii\helpers\Url::to(['test/index'])],
                    ],
                    [
                        'label' => 'Страница значений',
                        'icon' => 'tasks',
                        'url' => [\yii\helpers\Url::to(['information/index'])],
                    ],
                    [
                        'label' => 'Документы',
                        'icon' => 'tasks',
                        'url' => [\yii\helpers\Url::to(['document/index'])],
                    ],
                    [
                        'label' => 'Пользователи',
                        'icon' => 'tasks',
                        'url' => [\yii\helpers\Url::to(['user/index'])],
                    ],

                    ['label' => 'Выход', 'icon' => 'times-circle', 'url' => ['/site/logout'], 'template' => '<a href="{url}" data-method="post">{icon}{label}</a>'],
                ],
            ]
        ) ?>
    </section>
</aside>
