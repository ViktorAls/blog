<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tagPost".
 *
 * @property int $id_post
 * @property int $id_tag
 */
class TagPost extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tagPost';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_post', 'id_tag'], 'required'],
            [['id_post', 'id_tag'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_post' => 'Id Post',
            'id_tag' => 'Id Tag',
        ];
    }
}
