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
    public static function getLimitDesc($limit,$fieldDesc = 'id'){
        return self::find()->asArray()->limit($limit)->with('lesson')->orderBy([$fieldDesc => SORT_DESC])->all();
    }

    /**
     * @param array $where
     * @param string $select
     * @param array $with
     * @return array
     */
    public static function getOneModel($where,$with = ['postFiles','tags','lesson']){
        return self::find()->where($where)->asArray()->with($with)->one();
    }

    /**
     * @param string $condition
     * @return \yii\db\ActiveQuery
     */
    public static function getAll(){
        return self::find();
    }

    /**
     * @param string $condition
     * @param string $search
     * @param integer $lesson
     * @return \yii\db\ActiveQuery
     */
    public static function getLikeTitle($search,$lesson){
        if($lesson===0){
            return self::find()->andWhere(['like', 'title', $search]);
        }
        return self::find()->andWhere(['like', 'title', $search])->andWhere(['id_lesson'=>$lesson]);
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
            ->orderBy(['id' => SORT_DESC])
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