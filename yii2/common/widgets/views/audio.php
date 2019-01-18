
<div class="s-content__media col-full">
    <div class="s-content__post-thumb">
        <img src="<?=\yii\helpers\Url::home(true).$pathIcon.$icon?>" alt="">

        <div class="audio-wrap">

            <?php foreach ($data as $audio): ?>
            <audio id="player2" src="<?=\yii\helpers\Url::home(true).$pathAudio.'/'.$audio['name']?>" width="100%"
                   height="42" controls="controls"></audio>
            <?php endforeach;?>
        </div>
    </div>
</div>