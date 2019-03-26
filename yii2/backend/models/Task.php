<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property int $id_user
 * @property string $title
 * @property string $date_begin
 * @property string $date_end
 * @property int $priority
 * @property string $description
 *
 * @property User $user
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'priority'], 'integer'],
            [['title', 'date_begin', 'date_end', 'description'], 'required'],
            [['date_begin', 'date_end'], 'safe'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 120],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'title' => 'Title',
            'date_begin' => 'Date Begin',
            'date_end' => 'Date End',
            'priority' => 'Priority',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}