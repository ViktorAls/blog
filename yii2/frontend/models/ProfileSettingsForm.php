<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 07.02.2019
 * Time: 13:00
 */

namespace frontend\models;


use common\models\User;
use Yii;
use yii\base\Model;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

class ProfileSettingsForm extends Model
{

    public $file;


    public function rules()
    {
        return [
            [['file'], 'required']
        ];

    }

    /**
     * @param $nextFile
     * @return bool
     * @throws \yii\base\Exception
     */
    public function saveIcon($nextFile)
    {

        $user = User::findOne(['id'=>\Yii::$app->user->id]);
        if($file = UploadedFile::getInstance($this, 'file')){
            $user->icon = $this->saveOne($file,$nextFile);
        }
        return $user->save() ? true : false;
    }

    /**
     * @param UploadedFile $file
     * @param $nextFile
     * @return string
     * @throws \yii\base\Exception
     */
    public function saveOne($file,$nextFile){
        $dir = Yii::getAlias('@user');
        $this->createDir($dir);
        $this->isFileDelete($dir .'/'.$nextFile);
        $icon = time() .'_'.Yii::$app->getSecurity()->generateRandomString(6) . '.' . $file->extension;
        $file->saveAs($dir.'/'.$icon);
        return $icon;
    }
    /**
     * Если папки нету, то создалить её
     * @param $dir
     * @throws \yii\base\Exception
     * $dir - путь для проверки существования папки
     */
    public function createDir($dir){
        if (!is_dir($dir)){
            FileHelper::createDirectory($dir);
        }
    }

    /**
     * Для удаления файла, если он есть, то удалить его
     * @param $filename
     */
    public function isFileDelete($filename){

        if (is_file($filename)) {
            unlink($filename);
        }
    }
}