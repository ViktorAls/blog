<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 * @property int $type
 * @property string $icon
 * @property int $id_lesson
 *
 * @property Comment[] $comments
 * @property Lesson $lesson
 * @property PostFile[] $postFiles
 * @property TagPost[] $tagPosts
 * @property Tag[] $tags
 */
class Post extends \yii\db\ActiveRecord
{
    public $file;
    public $files;
    public $tags_arr;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'type', 'id_lesson', 'tags_arr'], 'required'],
            [['description', 'icon', 'file'], 'string'],
            [['files'], 'file', 'maxFiles' => 20],
            [['created_at', 'updated_at', 'type', 'id_lesson'], 'integer'],
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
            'title' => 'Заголовок',
            'description' => 'Описание',
            'created_at' => 'Добавлено',
            'updated_at' => 'Обновлено',
            'type' => 'Тип',
            'icon' => 'Иконка',
            'id_lesson' => 'Предмет',
            'files'=>'Приложенные файлы',
            'file'=>'Иконка приложения',
        ];
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['id_post' => 'id']);
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
    public function getPostFiles()
    {
        return $this->hasMany(PostFile::className(), ['id_post' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagPosts()
    {
        return $this->hasMany(TagPost::className(), ['id_post' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'id_tag'])->viaTable('tagPost', ['id_post' => 'id']);
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
        $dir = Yii::getAlias('@iconPost');
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
     * При выборки
     */
    public function afterFind()
    {
        $this->tags_arr = $this->tags;
    }

    /**
     * После сохранения
     *
     * @throws \yii\base\Exception
     */
    public function afterSave($insert, $changedAttributes)
    {
        if ($files = UploadedFile::getInstances($this, 'files')) {
            $this->saveLot($files);
        }
        $this->workTag();
        parent::afterSave($insert, $changedAttributes);
    }


    /**
     * @param UploadedFile $files
     * @throws \yii\base\Exception
     */
    public function saveLot($files)
    {
        $dir = Yii::getAlias('@imagesPost/' . $this->id);
        $this->createDir($dir);
        foreach ($files as $file) {
            $postFile = new PostFile();
            $postFile->name = time() . '_' . Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;
            $this->isFileDelete($dir . '/' . $postFile->name);
            $postFile->id_post = $this->id;
            $postFile->save();
            $file->saveAs($dir . '/' . $postFile->name);
        }
    }

    /**
     * Работа с тегами
     * Удалить теги  которые были исправлены при изменении записи
     * Добавить новые теги, при необходимости
     */
    /**
     *
     */
    public function workTag()
    {
        $v_arr = ArrayHelper::map($this->tags, 'id', 'id');
        foreach ($this->tags_arr as $one) {
            if (!in_array($one, $v_arr, false)) {
                $model = new TagPost();
                $model->id_post = $this->id;
                $model->id_tag = $one;
                $model->save();
            }
            if (isset($v_arr[$one])) {
                unset($v_arr[$one]);
            }
        }
        foreach ($v_arr as $one) {
            TagPost::deleteAll(['id_tag' => $one, 'id_post' => $this->id]);
        }
    }

    /**
     * перед удалением
     */
    public function beforeDelete()
    {
        TagPost::deleteAll(['id_post' => $this->id]);
        $this->additionalFilesDelete();
        return parent::beforeDelete();
    }

    /**
     *Удалить дополнительные файлы из базы и сервера
     */
    public function additionalFilesDelete()
    {
        $dir = yii::getAlias('@imagesPost');
        $images = PostFile::find()->where('id_post=:id', [':id' => $this->id])->asArray()->all();
        foreach ($images as $image) {
            if (file_exists($dir . '/' . $this->id . '/' . $image['name'])) {
                unlink($dir . '/' . $this->id . '/' . $image['name']);
            }
        }
        $this->isFileDelete(yii::getAlias('@iconPost') . '/' . $this->icon);
        if (is_dir($dir . '/' . $this->id)) {
            rmdir($dir . '/' . $this->id);
        }
        PostFile::deleteAll(['id_post' => $this->id]);
    }

    public function getImagesLinks()
    {
        $imagesUrl = [];
        $dir = yii::getAlias('@filePostUrl/') . $this->id;
        $names = ArrayHelper::getColumn($this->postFiles, 'imagesUrl');
        foreach ($names as $name) {
            $imagesUrl[] = $dir . '/' . $name;
        }
        return $imagesUrl;
    }

    public function getImageLink()
    {
        return yii::getAlias('@iconUrl/') . $this->icon;
    }

    /**
     * Данные для картинкок
     */
    public function getImagesLinksData()
    {
        return ArrayHelper::toArray($this->postFiles, [PostFile::className() => ['caption' => 'name', 'key' => 'id']]);
    }
}
