<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 14.02.2019
 * Time: 22:44
 */

namespace common\models\query;


use common\models\Lesson;
use yii\helpers\Url;

class LessonQuery extends Lesson
{

    /**
     * @return array
     */
    public static function headerDocument()
    {
        $lessons = self::find()->asArray()->all();
        $lessonArray = [];
        foreach ($lessons as $lesson) {
            $lessonArray[] = ['title' => $lesson['name'], 'url' => Url::to(['document/index', 'lesson' => $lesson['id_lesson']])];
        }
        return $lessonArray;
    }

    /**
     * @param $id
     * @return string
     */
    public static function title($id){
        return self::find()->where(['id_lesson'=>$id])->asArray()->one()['name'];
    }
}