<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id_post
 * @property string $title название
 * @property string $description описание
 * @property int $created_at создал
 * @property int $updated_at обновил
 * @property int $type тип записи (1=фото, 2=аудио,3=просто пост)
 * @property string $icon
 * @property int have looked сколько просмотрело
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @return string
     *{@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @return array
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'created_at', 'updated_at', 'type'], 'required'],
            [['description', 'icon'], 'string'],
            [['created_at', 'updated_at', 'type', 'bool'], 'integer'],
            [['title'], 'string', 'max' => 250],
        ];
    }

    /**
     * @return array
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_post' => 'Id Post',
            'title' => 'Название',
            'description' => 'Описание',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'type' => 'Тип записи',
            'icon' => 'Иконка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags(){
        return $this->hasMany(TagPost::className(),['id_post'=>'id_post']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags(){
        return $this->hasMany(Tag::className(),['id_tag'=>'id_tag'])->via('postTags');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFile(){
        return $this->hasMany(PostFile::className(),['id_post'=>'id_post']);
    }


}
