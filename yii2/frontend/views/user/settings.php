<?php

use kartik\file\FileInput;

?>
<div class="row">
    <div class="col-md-4">jkl</div>
    <div class="col-md-6">
        <?php

        echo FileInput::widget([
            'name' => 'attachment_49[]',
            'options'=>[
                'multiple'=>е
            ],
            'showMessage' => false,
            'pluginOptions' => [
                'initialPreview'=>[
                    "http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg",
                    "http://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Earth_Eastern_Hemisphere.jpg/600px-Earth_Eastern_Hemisphere.jpg"
                ],
                'initialPreviewAsData'=>true,
                'initialCaption'=>"The Moon and the Earth",
                'initialPreviewConfig' => [
                    ['caption' => 'Moon.jpg', 'size' => '873727'],
                    ['caption' => 'Earth.jpg', 'size' => '1287883'],
                ],
                'overwriteInitial'=>false,
                'maxFileSize'=>2800
            ]
        ]);

        ?>
    </div>
</div>