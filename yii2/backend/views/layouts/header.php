<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>


<header class="main-header">
   
    <?= Html::a('<span class="logo-mini"> <img src="/favicon.ico" style="max-width: 30px" alt=""></span><span class="logo-lg"><img src="/favicon.ico" style="max-width: 30px" alt=""> Panel</span>', Yii::$app->homeUrl, ['class' => 'logo','data-toggle'=>'push-menu', 'role'=>'button']) ?>
</header>
