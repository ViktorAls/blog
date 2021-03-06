<?php

namespace common\models;

/**
 * This is the model class for table "postFile".
 *
 * @property int $id
 * @property string $name
 * @property int $id_post
 *
 * @property Post $post
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
            [['name', 'id_post'], 'required'],
            [['name'], 'string'],
            [['id_post'], 'integer'],
            [['id_post'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['id_post' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'id_post' => 'Запись',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'id_post']);
    }

    /*
    * Вернёт путь картинки,
    * */
    public function getImagesUrl()
    {
        if ($this->name) {
            $path = $this->name;
        } else {
            $path = 'img/noimage.jpg';
        }
        return $path;
    }
}
