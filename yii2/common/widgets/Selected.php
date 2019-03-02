<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 15.01.2019
 * Time: 17:53
 */

namespace common\widgets;


use common\models\query\PostQuery;
use yii\base\Widget;

class Selected extends Widget
{
    /**
     * @var int
     */
    public $limit = 3;

    const PHOTO_LECTURE = 1;
    const AUDIO_LECTURE = 2;

    /**
     * @return string
     */
    public function run()
    {
        $posts = PostQuery::getLimitDesc($this->limit, 'updated_at');
        return $this->render('selected', compact('posts'));
    }


}