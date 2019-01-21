<div class="s-content__media col-full">
    <div class="s-content__slider slider">
        <div class="slider__slides">
            <img src="<?=\yii\helpers\Url::home(true).$pathIcon.$icon?>" >
            <?php if($data!= null):?>
            <?php foreach ($data as $photo): ?>
                    <img src="<?=\yii\helpers\Url::home(true).$pathPhoto.$photo['name']?>" alt="" >
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>
