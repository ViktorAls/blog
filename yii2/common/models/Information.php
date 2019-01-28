<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "information".
 *
 * @property int $id_information
 * @property string $name
 * @property string $value
 */
class Information extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'information';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'value'], 'required'],
            [['value'], 'string'],
            [['name'], 'string', 'max' => 200],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_information' => 'Id Information',
            'name' => 'Название',
            'value' => 'Значение',
        ];
    }
}
