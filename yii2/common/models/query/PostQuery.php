<?php

namespace common\models\query;

use common\models\Post;
use yii\data\Pagination;
use yii\db\ActiveQuery;
use yii\db\Expression;

class PostQuery extends Post
{

    /**
     * @param int $limit
     * @return array
     */
    public static function getRand($limit = 6){
        return self::find()
            ->orderBy(new Expression('rand()'))
            ->limit($limit)
            ->asArray()
            ->all();
    }

    /**
     * @param integer $limit
     * @param string $fieldDesc
     * @return array
     */
    public static function getLimitDesc($limit,$fieldDesc = 'id_post'){
        return Post::find()->asArray()->limit($limit)->orderBy([$fieldDesc => SORT_DESC])->all();
    }

    /**
     * @param array $where
     * @param array $with
     * @return array
     */
    public static function getOneModel($where,$with = ['file','tags']){
        return self::find()->where($where)->asArray()->with($with)->one();
    }

    /**
     * @param string $condition
     * @return \yii\db\ActiveQuery
     */
    public static function getAllByType($condition){
        return self::find()->where($condition);
    }

    /**
     * @param string $condition
     * @param string $search
     * @return \yii\db\ActiveQuery
     */
    public static function getByTypeLikeTitle($condition,$search){
        return self::find()->where($condition)->andWhere(['like', 'title', $search]);
    }

    /**
     * @param string $search
     * @return ActiveQuery
     */
    public static function getModelLikeTitle($search){
        return self::find()->andWhere(['like', 'title', $search]);
    }

    /**
     * @param ActiveQuery $query
     * @return array
     */
    public static function getPagesPosts($query)
    {
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()
            ->with('tags')
            ->orderBy(['id_post' => SORT_DESC])
            ->all();
        return [$pages, $posts];
    }

    /**
     * @param string $search
     * @return ActiveQuery
     */
    public static function getLikeTag($tag,$search=''){
      return  self::find()->joinWith('tags')->where(['like', 'tag.name', $tag])->andWhere(['like','post.title',$search]);
    }
}