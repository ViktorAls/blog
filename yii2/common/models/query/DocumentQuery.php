<?php


namespace common\models\query;


use common\models\Document;
use yii\data\Pagination;
use yii\db\ActiveQuery;

class DocumentQuery extends Document
{

    /**
     * @param ActiveQuery $query
     * @return array
     */
    public static function getPagesDocument($query)
    {
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()
            ->with('tags')
            ->orderBy(['id_document' => SORT_DESC])
            ->all();
        return [$pages, $posts];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function getAll(){
        return self::find();
    }

    /**
     * @param string $search
     * @return \yii\db\ActiveQuery
     */
    public static function getLikeTitle($search){
        return self::find()->andWhere(['like', 'name', $search]);
    }

}