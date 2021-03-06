<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property string $title
 * @property string $icon
 * @property int $id_test
 *
 * @property Answer[] $answers
 * @property Test $test
 */
class Question extends \yii\db\ActiveRecord
{

    public $file;
    public $answer;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title',  'id_test'], 'required'],
            [['title'], 'string'],
            [['answer', 'file'], 'safe'],
            [['id_test'], 'integer'],
            [['icon'], 'string', 'max' => 40],
            [['id_test'], 'exist', 'skipOnError' => true, 'targetClass' => Test::className(), 'targetAttribute' => ['id_test' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Вопрос',
            'icon' => 'Иконка',
            'id_test' => 'Тест',
        ];
    }

    public function afterFind()
    {
        $this->answer = $this->answers;
        parent::afterFind();
    }

    /**
     * Перед сохранением
     * @throws \yii\base\Exception
     */
    public function beforeSave($insert)
    {
        if ($file = UploadedFile::getInstance($this, 'file')) {
            $this->saveOne($file);
        }
        return parent::beforeSave($insert);
    }

    /**
     * Сохранение одной картинки (icon)
     * @param UploadedFile $file
     * @throws \yii\base\Exception
     * Для грузки 1 файла на сервер  и сохранении его в базу данных
     */
    public function saveOne($file)
    {
        $dir = Yii::getAlias('@testIcon');
        $this->createDir($dir);
        $this->isFileDelete($dir . "/$this->icon");
        $this->icon = time() . '_' . Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;
        $file->saveAs($dir . '/' . $this->icon);
    }

    /**
     * Если папки нету, то создалить её
     * @param string $dir
     * @throws \yii\base\Exception
     * $dir - путь для проверки существования папки
     */
    public function createDir($dir)
    {
        if (!is_dir($dir)) {
            FileHelper::createDirectory($dir);
        }
    }

    /**
     * Для удаления файла, если он есть, то удалить его
     * @param $filename
     */
    public function isFileDelete($filename)
    {

        if (is_file($filename)) {
            unlink($filename);
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['id_question' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTest()
    {
        return $this->hasOne(Test::className(), ['id' => 'id_test']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->setAnswer();
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    public function getImageLink()
    {
        return yii::getAlias('@iconTestUrl/') . $this->icon;
    }

    /**
     * Потом переделать.
     */
    public function setAnswer()
    {
        Answer::deleteAll(['id_question' => $this->id]);
        foreach ($this->answer as $one) {

            $model = new Answer();
            $model->id_question = $this->id;
            $model->bool = $one['bool'];
            $model->title = $one['title'];
            $model->save();
        }
    }
}
