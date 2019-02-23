<?php

namespace common\models\query;

use common\models\Tag;

class TagQuery extends Tag
{

    /**
     * @param int $limit
     * @param string $field
     * @return array
     */
    public static function getLimitDesc($limit,$field = 'id'){
        return self::find()->asArray()->orderBy([$field=>SORT_DESC])->limit($limit)->all();
    }

    /**
     * @return array|TagQuery[]|Tag[]|\yii\db\ActiveRecord[]
     */
    public static function getAll(){
        return self::find()->asArray()->all();
    }
}