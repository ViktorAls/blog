<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tagDocument".
 *
 * @property int $id_document
 * @property int $id_tag
 *
 * @property Document $document
 * @property Tag $tag
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
            [['id_document', 'id_tag'], 'unique', 'targetAttribute' => ['id_document', 'id_tag']],
            [['id_document'], 'exist', 'skipOnError' => true, 'targetClass' => Document::className(), 'targetAttribute' => ['id_document' => 'id']],
            [['id_tag'], 'exist', 'skipOnError' => true, 'targetClass' => Tag::className(), 'targetAttribute' => ['id_tag' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_document' => 'Id Document',
            'id_tag' => 'Id Tag',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocument()
    {
        return $this->hasOne(Document::className(), ['id' => 'id_document']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['id' => 'id_tag']);
    }
}
