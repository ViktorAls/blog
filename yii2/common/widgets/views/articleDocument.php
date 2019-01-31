<?php
/**
 * @var string $url_download
 * @var string $icon
 * @var string $title
 * @var string $description
 * @var array $tags
 * @var string $created_at
 * @var string $updated_at
 * @var string $getTagParams
 */

?>
<article class="ilia" data-aos="fade-up">
    <div class="ilia_card">
        <a href="<?= $url_download ?>" class="copy_link " title="Скопировать ссылку"><i class="fas fa-copy"></i></a>
        <div class="ilia_card-img visible-md visible-lg hiddenv">
            <a href="#"><img src="<?= $icon ?>" alt=""></a>
        </div>
        <div class="ilia_card-info">
            <h2><?= $title ?></h2>
        </div>
        <p><?= $description ?></p>
    </div>
    <div class="inf">
        <div class="date">
            <div class="entry__date">
                <div><p>Дата публикации: <strong><?= $created_at ?></strong></p></div>
                <div><p>Дата изменения: <strong><?= $updated_at ?></strong></p></div>
            </div>
            <div class="btn_donov">
                <a class="btn_donov-click" href="<?= $url_download ?>">Скачать</a>
            </div>
        </div>
    </div>
    <div class="tage_gl">
        <span class="tage"><span class="tage_document">Теги документа</span>
            <?php foreach ($tags as $tag): ?>
                <a href="<?=\yii\helpers\Url::current(['tag'=>$tag['name']])?>"><?= $tag['name'] ?></a>
            <? endforeach; ?>
        </span>
    </div>
</article>
