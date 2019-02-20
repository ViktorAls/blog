<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $id_lesson
 * @property string $date
 * @property string $begin_date
 * @property string $end_date
 * @property Question[] $questions
 * @property Lesson $lesson
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'id_lesson', 'date', 'begin_date', 'end_date'], 'required'],
            [['description'], 'string'],
            [['id_lesson'], 'integer'],
            [['date', 'begin_date', 'end_date'], 'safe'],
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
            'title' => 'Название',
            'description' => 'Описание',
            'id_lesson' => 'Урок',
            'begin_date' => 'Begin Date',
            'end_date' => 'End Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['id_test' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::className(), ['id' => 'id_lesson']);
    }
}
