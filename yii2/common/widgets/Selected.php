<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 15.01.2019
 * Time: 17:53
 */

namespace common\widgets;


use common\models\Post;
use yii\base\Widget;

class Selected extends Widget
{
    /**
     * @return string
     */
    public function run()
    {
        $post = Post::find()->asArray()->limit(3)->orderBy(['updated_at' => SORT_DESC])->all();
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
            if ($post['type'] == 1) {
                $posts[$key]['category'] = 'Фото лекция';
            } else if ($post['type'] == 2) {
                $posts[$key]['category'] = 'Аудио лекция';
            } else if ($post['type'] == 3) {
                $posts[$key]['category'] = 'Лекция';
            }
        }
        return $posts;
    }

}