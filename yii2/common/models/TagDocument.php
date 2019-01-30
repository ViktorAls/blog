<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tagDocument".
 *
 * @property int $id
 * @property int $id_document
 * @property int $id_tag
 */
class TagDocument extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tagDocument';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_document', 'id_tag'], 'required'],
            [['id_document', 'id_tag'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_document' => 'Id Document',
            'id_tag' => 'Id Tag',
        ];
    }
}
