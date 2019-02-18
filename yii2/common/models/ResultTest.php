<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "resultTest".
 *
 * @property int $id
 * @property int $id_test
 * @property int $id_user
 * @property string $date
 * @property double $result
 *
 * @property Test $test
 * @property User $user
 */
class ResultTest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resultTest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_test', 'id_user', 'date', 'result'], 'required'],
            [['id_test', 'id_user'], 'integer'],
            [['date'], 'safe'],
            [['result'], 'number'],
            [['id_test'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['id_test' => 'id']],
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
            'id_test' => 'Тест',
            'id_user' => 'Пользователь',
            'date' => 'Дата прохождения',
            'result' => 'Результат',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'id_test']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
