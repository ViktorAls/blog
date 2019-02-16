<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 16.02.2019
 * Time: 16:55
 */

namespace common\models\query;


use common\models\Group;

class GroupQuery extends Group
{

    public static function getGroupAll(){
        return self::find()->asArray()->all();
    }
}