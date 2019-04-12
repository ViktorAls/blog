<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 16.02.2019
 * Time: 16:55
 */

namespace common\models\query;


use common\models\Group;
use yii\helpers\ArrayHelper;

class GroupQuery extends Group
{

    public static function getGroupAll(){
        return self::find()->asArray()->all();
    }

    public static function getGroup(){
        return ArrayHelper::map(self::find()->asArray()->all(),'id','name');
    }
}