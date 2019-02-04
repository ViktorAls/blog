<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user \frontend\models\User; */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p><?= Html::encode($user->name) ?>, доброе время суток, Вы запросили сброс пароля.</p>

    <p>Перейдите по ссылке ниже, чтобы сбросить пароль:</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
