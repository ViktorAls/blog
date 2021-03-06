<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property string $name
 * @property string $href
 * @property string $description
 * @property int $updated_at
 * @property int $created_at
 * @property int $id_lesson
 *
 * @property Lesson $lesson
 * @property TagDocument[] $tagDocuments
 * @property Tag[] $tags
 */
class Document extends \yii\db\ActiveRecord
{

    public $file;
    public $tags_arr;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name','description', 'id_lesson','tags_arr'], 'required'],
            [['name', 'href', 'description'], 'string'],
            [['updated_at', 'created_at', 'id_lesson'], 'integer'],
            [['file'],'safe'],
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
            'name' => 'Название',
            'href' => 'Ссылка',
            'description' => 'Описание',
            'updated_at' => 'Изменено',
            'created_at' => 'Добавлено',
            'id_lesson' => 'Урок',
            'file'=>'Файл для скачивания',
            'tags_arr'=>'Теги для документа',
        ];
    }

    /**
     * При выборки
     */
    public function afterFind()
    {
        $this->tags_arr = $this->tags;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::className(), ['id' => 'id_lesson']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagDocuments()
    {
        return $this->hasMany(TagDocument::className(), ['id_document' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'id_tag'])->viaTable('tagDocument', ['id_document' => 'id']);
    }

    /**
     * @return bool
     */
    public function beforeDelete()
    {
        TagDocument::deleteAll(['id_tag' => $this->id]);
        $this->isFileDelete(yii::getAlias("@document/$this->href"));
        return parent::beforeDelete();
    }

    /**
     * @param bool $insert
     * @return bool
     * @throws \yii\base\Exception
     */
    public function beforeSave($insert){
        if($file = UploadedFile::getInstance($this, 'file')){
            if (!$this->isNewRecord && $this->href !== null){
                $this->isFileDelete(yii::getAlias("@document/$this->href"));
            }
            $this->saveFileOne($file);
        }
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->workTag();
        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }

    /**
     * @param UploadedFile $file
     * @throws \yii\base\Exception
     */
    public function saveFileOne($file){
        $dir = Yii::getAlias('@document');
        $this->createDir($dir);
        $this->href = time() .'_'.Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;
        $file->saveAs($dir.'/'.$this->href);
    }
    /**
     * Если папки нету, то создалить её
     * @param $dir
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
     * @param string $filename
     */
    public function isFileDelete($filename)
    {
        if (is_file($filename)) {
            unlink($filename);
        }
    }

    /**
     *
     */
    public function workTag()
    {
        $v_arr = ArrayHelper::map($this->tags, 'id', 'id');
        foreach ($this->tags_arr as $one) {
            if (!in_array($one, $v_arr, false)) {
                $model = new TagDocument();
                $model->id_document = $this->id;
                $model->id_tag = $one;
                $model->save();
            }
            if (isset($v_arr[$one])) {
                unset($v_arr[$one]);
            }
        }
        foreach ($v_arr as $one) {
            TagDocument::deleteAll(['id_tag' => $one, 'id_document' => $this->id]);
        }
    }
}
