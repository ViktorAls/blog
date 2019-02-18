<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 19.02.2019
 * Time: 1:00
 */

namespace common\models\query;


use common\models\Test;
use yii\data\Pagination;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * Class TestQuery
 * @package common\models\query
 */
class TestQuery extends Test
{

    public static function getTest(){
        return ArrayHelper::map(self::find()->asArray()->all(),'id','title');
    }

    public static function getAll(){
        return self::find()->asArray()->joinWith('lesson')->where(['>=','begin_date',date('Y-m-d H:i:s')])->andWhere(['>','end_date',date('Y-m-d H:i:s')]);
    }

    /**
     * @param ActiveQuery $query
     * @return array
     */
    public static function getPagesTest($query)
    {
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9]);
        $document = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['id' => SORT_DESC])
            ->asArray()
            ->all();
        return [$pages, $document];
    }

    /**
     * @param string $search
     * @return \yii\db\ActiveQuery
     */
    public static function getLikeTitle($search,$lesson){
        if ($lesson === 0){
            return self::find()->andWhere(['>=','begin_date',date('Y-m-d H:i:s')])->andWhere(['>','end_date',date('Y-m-d H:i:s')])->andWhere(['like', 'test.title', $search])->joinWith('lesson');
        }
        return self::find()->andWhere(['>=','begin_date',date('Y-m-d H:i:s')])->andWhere(['>','end_date',date('Y-m-d H:i:s')])->andWhere(['like', 'test.title', $search])->joinWith('lesson')->andWhere(['test.id_lesson'=>$lesson]);
    }
}
