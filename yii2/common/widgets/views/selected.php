<div class="pageheader-content row">
    <div class="col-full">

        <div class="featured">


            <?php foreach ($posts as $key => $post): ?>
            <?php if ($key===0): ?>
            <div class="featured__column featured__column--big">
                <?php elseif ($key===1): ?>
                <div class="featured__column featured__column--small">
                    <?php endif; ?>
                    <div class="entry"
                         style="background-image:url('<?= \yii\helpers\Url::home(true) . '/uploads/icon/' . $post['icon'] ?>');">

                        <div class="entry__content">
                            <span class="entry__category"><a href="#0"><?= $post['category'] ?></a></span>

                            <h1><a href="<?= \yii\helpers\Url::to(['posts/lesson', 'id' => $post['id']]) ?>"
                                   title=""><?= $post['title'] ?></a></h1>

                            <div class="entry__info">

                                <ul class="entry__meta">
                                    <li><?= date('F d,Y', (int)$post['updated_at']); ?></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <?php if ($key===0 || $key===2): ?>
                </div>
            <?php endif; ?>
                <?php endforeach; ?>

            </div>

        </div>
    </div>
</div>


