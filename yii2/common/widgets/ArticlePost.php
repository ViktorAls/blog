<?php

namespace common\widgets;

use yii\helpers\Html;
use yii\helpers\Url;


class ArticlePost extends \yii\base\Widget
{

    /**
     * @var integer
     */
    public $idPost;

    /**
     * @var string
     */
    public $nameIcon;

    /**
     * @var DateTime
     */
    public $datePublication;
    /**
     * @var string
     */
    public $title;

    /**
     * @var array
     */
    public $tags;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $getParamsPost = 'id';

    /**
     * @var string
     */
    public $fullActionPost = 'posts/lesson';

    /**
     * @var string
     */
    public $formatDate = 'F d, Y';

    /**
     * @var string
     */
    public $getParamsTag = 'search';

    /**
     * @var string
     */
    public $fullActionTags ='posts/tags';


    /**
     * @var string
     */
    public $pathIcon ='/uploads/icon/';



    public function run()
    {
        $urlFullPost = Url::to([$this->fullActionPost, $this->getParamsPost => $this->idPost]);
        $urlIcon = Url::home(true) . $this->pathIcon . $this->nameIcon;
        $title = Html::encode($this->title);
        $date = date($this->formatDate, $this->datePublication);
        $description =  mb_strimwidth(Html::encode($this->description), 0, 150, "...");
        return $this->render('articlePost', [
            'urlFullPost'=>$urlFullPost,
            'urlIcon'=>$urlIcon,
            'title'=>$title,
            'date'=>$date,
            'description'=>$description,
            'tags'=>$this->tags,
            'fullActionTags'=>$this->fullActionTags,
            'getParamsTag'=>$this->getParamsTag
        ]);
    }
}