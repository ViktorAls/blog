<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 15.01.2019
 * Time: 17:53
 */

namespace common\widgets;

use common\models\query\TagQuery;
use common\models\Tag;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class Tags extends Widget
{

    /**
     * @var int
     */
    public $limit = 10;

    /**
     * @return string
     */
    public function run()
    {
        $tags = TagQuery::getLimitDesc($this->limit,'id');
        return $this->createHtmlTags($tags);
    }

    /**
     * @param array $tags
     * @return string
     */
    public function createHtmlTags(array $tags){
        $html = null;
        if (Yii::$app->controller->route === 'document/index') {
            foreach ($tags as $tag) {
                $html .= Html::a($tag['name'], Url::current(['tag' => $tag['name']]));
            }
        } else {
            foreach ($tags as $tag) {
                $html .= Html::a($tag['name'], Url::to(['posts/tags', 'tag' => $tag['name']]));
            }
        }
        return $html;
    }

}