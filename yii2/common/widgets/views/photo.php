<div class="s-content__media col-full">
    <div class="s-content__slider slider">
        <div class="slider__slides">
            <div class="slider__slide">
                <img src="<?= \yii\helpers\Url::home(true) . $pathIcon . $icon ?>">
            </div>
            <?php if ($data!==null): ?>
                <?php foreach ($data as $photo): ?>
                    <div class="slider__slide">
                        <img src="<?= \yii\helpers\Url::home(true) . $pathPhoto . $photo['name'] ?>" alt="">
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
