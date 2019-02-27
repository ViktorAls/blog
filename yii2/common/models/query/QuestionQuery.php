<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 27.02.2019
 * Time: 17:27
 */

namespace common\models\query;


use common\models\Question;

class QuestionQuery extends Question
{
    /**
     * @param $id
     * @return array|QuestionQuery[]|Question[]|\yii\db\ActiveRecord[]
     */
    public static function getQuestionTest($id)
    {
       return self::find()->where(['id_test'=>$id])->asArray()->with('answer')->all();
    }

    public static function getRightAnswerTest($id){
        return self::find()->where(['question.id_test'=>$id])->andWhere('answer.bool = 1')->asArray()->innerJoin('answer')->all();

    }
}