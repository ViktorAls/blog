<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 07.02.2019
 * Time: 15:45
 */

namespace common\models\query;



use common\models\UserFrontend;

class UserFrontendQuery extends UserFrontend
{
    public static function getOpenInformation(){
       return self::find()->select('group.name,user.icon,user.name,user.id_group,user.middlename,user.patronymic')
            ->where(['id'=>\Yii::$app->user->id])
            ->joinWith('group')
            ->asArray()
            ->one();
    }
}