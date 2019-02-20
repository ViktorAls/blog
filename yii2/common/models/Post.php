<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 * @property int $type
 * @property string $icon
 * @property int $id_lesson
 *
 * @property Comment[] $comments
 * @property Lesson $lesson
 * @property PostFile[] $postFiles
 * @property TagPost[] $tagPosts
 * @property Tag[] $tags
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'created_at', 'updated_at', 'type', 'icon', 'id_lesson'], 'required'],
            [['description', 'icon'], 'string'],
            [['created_at', 'updated_at', 'type', 'id_lesson'], 'integer'],
            [['title'], 'string', 'max' => 150],
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
            'title' => 'Заголовок',
            'description' => 'Описание',
            'created_at' => 'Добавлено',
            'updated_at' => 'Обновлено',
            'type' => 'Тип',
            'icon' => 'Иконка',
            'id_lesson' => 'Урок',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['id_post' => 'id']);
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
    public function getPostFiles()
    {
        return $this->hasMany(PostFile::className(), ['id_post' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagPosts()
    {
        return $this->hasMany(TagPost::className(), ['id_post' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'id_tag'])->viaTable('tagPost', ['id_post' => 'id']);
    }
}
