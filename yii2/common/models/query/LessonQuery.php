<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 14.02.2019
 * Time: 22:44
 */

namespace common\models\query;


use common\models\Lesson;

class LessonQuery extends Lesson
{

    /**
     * @return array|DocumentQuery[]|LessonQuery[]|\yii\db\ActiveRecord[]
     */
    public static function getAll()
    {
        return self::find()->asArray()->all();
    }

    /**
     * @param int $id
     * @return string
     */
    public static function getTitle($id){
        return self::find()->where(['id'=>$id])->asArray()->one()['name'];
    }
}