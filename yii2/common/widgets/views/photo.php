<div class="s-content__media col-full">
    <div class="s-content__slider slider">
        <div class="slider__slides">
                <?php foreach ($data as $photo): ?>
                    <img src="<?=\yii\helpers\Url::home(true).$path.$photo['name']?>" alt="" >
                <?php endforeach;?>
        </div>
    </div>
</div>
