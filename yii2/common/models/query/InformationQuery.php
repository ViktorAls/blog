<?php

namespace common\models\query;

use common\models\Information;

class InformationQuery extends Information
{
    /**
     * @return array|Information[]|InformationQuery[]|\yii\db\ActiveRecord[]
     */
    public static function getMessenger(){
        return self::find()
            ->indexBy('name')
            ->orWhere(['name'=>'facebook'])
            ->orWhere(['name'=>'mail'])
            ->orWhere(['name'=>'vkontakte'])
            ->asArray()
            ->all();
    }

    public static function getPointOfView(){
        return self::find()->asArray()->where(['name'=>'pointOfView'])->one();
    }

}