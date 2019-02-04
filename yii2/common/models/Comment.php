<?php

namespace common\models;

use frontend\models\User;
use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id_comment
 * @property int $id_post
 * @property int $id_parent
 * @property string $text
 * @property string $created_at
 * @property int $id_user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_post', 'id_parent', 'id_user'], 'integer'],
            [['text', 'created_at', 'id_user'], 'required'],
            [['text'], 'string'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_comment' => 'Id Comment',
            'id_post' => 'Id Post',
            'id_parent' => 'Id Parent',
            'text' => 'Text',
            'created_at' => 'Created At',
            'id_user' => 'Id User',
        ];
    }

    public  function  getUser(){
        return $this->hasOne(User::className(),['id'=>'id_user']);
    }
}
