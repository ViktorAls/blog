<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 15.01.2019
 * Time: 17:53
 */

namespace common\widgets;

use common\models\Tag;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class Tags extends Widget
{

    public $limit = 10;

    public function run()
    {
        $tags = Tag::find()->asArray()->orderBy(['id_tag'=>SORT_DESC])->limit($this->limit)->all();
        return $this->createHtmlTags($tags);
    }

    /**
     * @param array $tags
     * @return string
     */
    public function createHtmlTags(array $tags){
        $html = null;
        foreach ($tags as $tag){
            $html .= Html::a($tag['name'],Url::to(['posts/tags','id'=>$tag['id_tag']]));
        }
        return $html;
    }

}