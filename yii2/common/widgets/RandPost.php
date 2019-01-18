<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 17.01.2019
 * Time: 15:59
 */

namespace common\widgets;


use common\models\Post;
use yii\base\Widget;
use yii\db\Expression;
use yii\helpers\Html;
use yii\helpers\Url;

class RandPost extends Widget
{


    public function run()
    {
        $html = '';
        $posts = Post::find()
            ->orderBy(new Expression('rand()'))
            ->limit(6)
            ->asArray()
            ->all();
        foreach ($posts as $post) {
            $html .= $this->getArticle($post);
        }
        return $html;
    }

    /**
     * @param Post $post
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
        $date = date('Y-m-d',$post['created_at']);
        $html .= Html::beginTag('time', ['datetime' =>$date]);
        $html .= date('F d, Y',$date);
        $html .= Html::endTag('span');
        $html .= Html::endTag('span');
        $html .= Html::endTag('section');
        $html .= Html::endTag('article');
        return $html;
    }


}