<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 30.01.2019
 * Time: 19:57
 */

namespace common\widgets;


use yii\base\Widget;
use yii\helpers\Url;

class ArticleDocument extends Widget
{

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $fileName;
    /**
     * @var integer
     */
    public $created_at;

    /**
     * @var integer
     */
    public $updated_at;

    /**
     * @var array
     */
    public $tags;

    /**
     * @var string
     */
    public $defaultIcon = 'txt.svg';

    /**
     * @var string
     */
    public $formatDate = 'F d, Y';

    /**
     * @var string
     */
    public $pathIcon = '/uploads/iconDocument/';

    public $getParamsDownload = 'file';

    public function run()
    {
        $iconPath = pathinfo(\Yii::getAlias('@iconDocument')
                . '/' . $this->fileName, PATHINFO_EXTENSION) . '.svg';
        if (file_exists(\Yii::getAlias('@iconDocument') . '/' . $iconPath)) {
            $icon = Url::home(true) . $this->pathIcon . $iconPath;
        } else {
            $icon = Url::home(true) . $this->pathIcon . $this->defaultIcon;
        }
        $created_at = date($this->formatDate, $this->created_at);
        $updated_at = date($this->formatDate, $this->updated_at);
        $url_download = Url::to(['document/download',$this->getParamsDownload=>$this->fileName]);
        return $this->render('articleDocument', [
            'title' => $this->title,
            'icon' => $icon,
            'url_download' => $url_download,
            'description' => $this->description,
            'tags' => $this->tags,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ]);
    }
}