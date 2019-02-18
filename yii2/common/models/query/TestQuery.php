<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 19.02.2019
 * Time: 1:00
 */

namespace common\models\query;


use common\models\Test;
use yii\helpers\ArrayHelper;

class TestQuery extends Test
{

    public static function getTest(){
        return ArrayHelper::map(self::find()->asArray()->all(),'id','title');
    }
}