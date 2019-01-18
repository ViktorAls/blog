<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "postFile".
 *
 * @property int $id_file
 * @property string $name
 * @property int $id_post
 */
class PostFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'postFile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['id_post'], 'required'],
            [['id_post'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_file' => 'Id File',
            'name' => 'Name',
            'id_post' => 'Id Post',
        ];
    }
}
