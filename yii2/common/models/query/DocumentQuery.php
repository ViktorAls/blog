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
        $document = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['id' => SORT_DESC])
            ->asArray()
            ->all();
        return [$pages, $document];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function getAll()
    {
        return self::find()->joinWith('tags');
    }

    /**
     * @param string $search
     * @param string $tag
     * @param string $lesson
     * @return ActiveQuery
     */
    public static function getLikeTitle($search, $tag, $lesson)
    {
        if ($lesson===0) {
            return self::find()
                ->andWhere(['like', 'document.name', $search])
                ->joinWith('tags')
                ->andWhere(['like', 'tag.name', $tag]);
        }
        return self::find()->andWhere(['like', 'document.name', $search])
            ->andWhere(['document.id_lesson' => $lesson])
            ->joinWith('tags')
            ->andWhere(['like', 'tag.name', $tag]);
    }

}