<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property string $name
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_lesson' => 'Id Lesson',
            'name' => 'Name',
        ];
    }
}
