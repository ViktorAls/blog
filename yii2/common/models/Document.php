<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property string $name
 * @property string $href
 * @property string $description
 * @property int $updated_at
 * @property int $created_at
 * @property int $id_lesson
 *
 * @property Lesson $lesson
 * @property TagDocument[] $tagDocuments
 * @property Tag[] $tags
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'href', 'description', 'updated_at', 'created_at', 'id_lesson'], 'required'],
            [['name', 'href', 'description'], 'string'],
            [['updated_at', 'created_at', 'id_lesson'], 'integer'],
            [['id_lesson'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::className(), 'targetAttribute' => ['id_lesson' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'href' => 'Href',
            'description' => 'Description',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
            'id_lesson' => 'Id Lesson',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::className(), ['id' => 'id_lesson']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagDocuments()
    {
        return $this->hasMany(TagDocument::className(), ['id_document' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'id_tag'])->viaTable('tagDocument', ['id_document' => 'id']);
    }
}
