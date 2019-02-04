<?php

/* @var $this yii\web\View */
/* @var $user frontend\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<?= $user->name ?>, доброе время суток, Вы запросили сброс пароля.

Перейдите по ссылке ниже, чтобы сбросить пароль:

<?= $resetLink ?>
