<div class="pageheader-content row">
    <div class="col-full">

        <div class="featured">

            <div class="featured__column featured__column--big">
                <div class="entry"
                     style="background-image:url('<?= \yii\helpers\Url::home(true) . '/uploads/icon/' . $post[0]['icon'] ?>');">

                    <div class="entry__content">
                        <span class="entry__category"><a href="#0"><?= $post[0]['category'] ?></a></span>

                        <h1><a href="<?= \yii\helpers\Url::to(['posts/lesson', 'id' => $post[0]['id_post']]) ?>"
                               title=""><?= $post[0]['title'] ?></a></h1>

                        <div class="entry__info">

                            <ul class="entry__meta">
                                <li><?= date('F d, Y', (int)$post[0]['updated_at']); ?></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

            <div class="featured__column featured__column--small">

                <div class="entry"
                     style="background-image:url('<?= \yii\helpers\Url::home(true) . '/uploads/icon/' . $post[1]['icon'] ?>');">

                    <div class="entry__content">
                        <span class="entry__category"><a href="#0"><?= $post[1]['category'] ?></a></span>

                        <h1><a href="<?= \yii\helpers\Url::to(['posts/lesson', 'id' => $post[1]['id_post']]) ?>"
                               title=""><?= $post[0]['title'] ?></a></h1>

                        <div class="entry__info">

                            <ul class="entry__meta">
                                <li><?= date('F d,Y', (int)$post[1]['updated_at']); ?></li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="entry"
                     style="background-image:url('<?= \yii\helpers\Url::home(true) . '/uploads/icon/' . $post[2]['icon'] ?>');">
                    <div class="entry__content">
                        <span class="entry__category"><a href="#0"><?= $post[2]['category'] ?></a></span>

                        <h1><a href="<?= \yii\helpers\Url::to(['posts/lesson', 'id' => $post[2]['id_post']]) ?>"
                               title=""><?= $post[0]['title'] ?></a></h1>

                        <div class="entry__info">

                            <ul class="entry__meta">
                                <li><?= date('F d, Y', (int)$post[2]['updated_at']); ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
