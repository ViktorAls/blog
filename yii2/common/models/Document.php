<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property int $id_document
 * @property string $name
 * @property string $href
 * @property string $description
 * @property string $updated_at
 * @property string $created_at
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
            [[ 'name', 'href', 'description', 'date'], 'required'],
            [['updated_at','created_at'], 'integer'],
            [['name', 'href', 'description'], 'string'],
            [['date'], 'safe'],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_document' => 'Id',
            'name' => 'Заголовок',
            'href' => 'Название для скачивания',
            'description' => 'Описание',
            'created_at' => 'Опубликовоно',
            'updated_at'=>'Изменено',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentTag(){
        return $this->hasMany(TagDocument::className(),['id_document'=>'id_document']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags(){
        return $this->hasMany(Tag::className(),['id_tag'=>'id_tag'])->via('documentTag');
    }
}
