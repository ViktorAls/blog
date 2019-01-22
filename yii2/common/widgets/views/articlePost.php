<?php
/**
 * @var string $urlFullPost
 * @var string $urlIcon
 * @var string $description
 * @var string $title
 * @var array $tags
 * @var DateTime $date
 * @var string $fullActionTags
 * @var string $getParamsTag
 */

use yii\helpers\Html;
use yii\helpers\Url;
?>
<article class="masonry__brick entry format-standard" data-aos="fade-up">
    <div class="entry__thumb">
        <a href="<?= $urlFullPost ?>" class="entry__thumb-link">
            <img src="<?= $urlIcon ?>" srcset="<?= $urlIcon ?> 1x" alt="">
        </a>
    </div>
    <div class="entry__text">
        <div class="entry__header">
            <div class="entry__date">
                <a href="<?= $urlFullPost ?>"> <?= $date; ?></a>
            </div>
            <h1 class="entry__title">
                <a href="<?= $urlFullPost ?>"> <?= $title ?></a>
            </h1>
        </div>
        <div class="entry__excerpt">
            <p> <?= $description ?> </p>
        </div>
        <div class="entry__meta">
            <span class="entry__meta-links">
                <?php foreach ($tags as $tag): ?>
                    <?= Html::a(Html::encode($tag['name']), Url::to([$fullActionTags, $getParamsTag => $tag['name']])); ?>
                <?php endforeach; ?>
            </span>
        </div>
    </div>
</article>
