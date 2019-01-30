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
        $post = PostQuery::getLimitDesc($this->limit, 'updated_at');
        $post = $this->addType($post);
        return $this->render('selected', compact('post'));
    }

    /**
     * @param array $posts
     * @return array
     */
    public function addType(array $posts)
    {
        foreach ($posts as $key => $post) {

            switch ($post['type']) {
                case self::PHOTO_LECTURE :
                    $posts[$key]['category'] = 'Фото лекция';
                    break;
                case self::AUDIO_LECTURE :
                    $posts[$key]['category'] = 'Аудио лекция';
                    break;
                default:
                    $posts[$key]['category'] = 'Лекция';
            }
        }
        return $posts;
    }

}