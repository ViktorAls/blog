<aside class="main-sidebar">

    <section class="sidebar">

        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
	                [
		                'label' => 'Продукты мазагина',
		                'icon' => 'product-hunt',
		                'url' => '#',
		                'items' => [
			                ['label' => 'Все продукты', 'icon' => 'circle-notch', 'url' => ['/product/index'],],
			                ['label' => 'Добавить продукт', 'icon' => 'plus', 'url' => ['/product/create'],],
		                ],
	                ],
                    [
                        'label' => 'Заказы на покупку',
                        'icon' => 'tasks',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Отправленные', 'icon' => 'check-circle', 'url' => ['/check/ok'],],
                            ['label' => 'В ожидании', 'icon' => 'clock', 'url' => ['/check/no'],],
                        ],
                    ],
                    [
                        'label' => 'Заказы для мастера',
                        'icon' => 'tasks',
                        'url' => ['/order/index'],
                    ],
                    [
                        'label' => 'Мастер',
                        'icon' => 'code-branch',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Выполняются', 'icon' => 'check-circle', 'url' => ['/master/tasks'],],
                            ['label' => 'Можно взять', 'icon' => 'clock', 'url' => ['/master/ok'],],
                            ['label' => 'Выполненые', 'icon' => 'clock', 'url' => ['/master/no'],],

                        ],
                    ],
                    [
                        'label' => 'Отчёты',
                        'icon' => 'product-hunt',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Мастера', 'icon' => 'circle-notch', 'url' => ['/report/master'],],
                            ['label' => 'Продукция', 'icon' => 'plus', 'url' => ['/report/service'],],
                        ],
                    ],
                    ['label' => 'Выход', 'icon' => 'times-circle', 'url' => ['/site/logout'], 'template' => '<a href="{url}" data-method="post">{icon}{label}</a>'],
                ],
            ]
        ) ?>
    </section>
</aside>
