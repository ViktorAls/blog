<?php


namespace common\models\query;


use common\models\ResultTest;

class ResultQuery extends ResultTest
{

    public static function getAll(){
        return self::find()->asArray()->all();
    }

}