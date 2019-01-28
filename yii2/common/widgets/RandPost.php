<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 17.01.2019
 * Time: 15:59
 */

namespace common\widgets;


use common\models\Post;
use common\models\query\PostQuery;
use yii\base\Widget;
use yii\db\Expression;
use yii\helpers\Html;
use yii\helpers\Url;

class RandPost extends Widget
{


    public function run()
    {
        $html = '';
        $posts = PostQuery::getRand();
        foreach ($posts as $post) {
            $html .= $this->getArticle($post);
        }
        return $html;
    }

    /**
     * @param $post
     * @return string
     */
    protected function getArticle($post)
    {
        $html = '';
        $html .= Html::beginTag('article', ['class' => 'col-block popular__post']);
        $html .= Html::beginTag('a', ['class' => "popular__thumb",
            'href' => Url::to([
                'posts/lesson',
                'id' => $post['id_post']
            ])
        ]);
        $html .= Html::img(Url::home(true) . \Yii::getAlias('@icon') . '/' . $post['icon']);
        $html .= Html::endTag('a');
        $html .= Html::beginTag('h5');
        $html .= Html::a(mb_strimwidth(html::encode($post['title']), 0, 90, '...'),
            Url::to([
                'posts/lesson',
                'id' => $post['id_post']
            ])
        );
        $html .= Html::endTag('h5');
        $html .= Html::beginTag('section', ['class' => 'popular__meta']);
        $html .= Html::beginTag('span', ['class' => 'popular__date']);
        $html .= Html::beginTag('time', ['datetime' =>date('Y-m-d',$post['created_at'])]);
        $html .= date('Y-m-d',$post['created_at']);
        $html .= Html::endTag('span');
        $html .= Html::endTag('span');
        $html .= Html::endTag('section');
        $html .= Html::endTag('article');
        return $html;
    }


}