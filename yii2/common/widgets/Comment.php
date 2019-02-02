<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 02.02.2019
 * Time: 23:11
 */

namespace common\widgets;


use yii\base\Widget;
use yii\helpers\Html;

class Comment extends Widget
{

    /**
     * @var array
     */
    public $comments;

    public function getTree($items, $parentId = 0)
    {
        $tree = [];
        foreach ($items as $item) {
            if ($item['id_parent'] == $parentId) {
                $tree[$item['id_comment']] = $item;
                $tree[$item['id_comment']]['sub'] = $this->getTree($items, $item['id_comment']);
            }
        }
        return $tree;
    }

    protected function countComment($comments)
    {
        $count = 0;
        foreach ($comments as $comment) {
            if ($comment['id_parent'] == 0) {
                $count++;
            }
        }
        return $count;
    }

    /**
     * @var string
     */
    public $classContainer = 'comments-wrap';
    public $classTitleContainer = 'h2';
    public $classOl = 'commentlist';

    public function run()
    {
        $countComment = $this->countComment($this->comments);
        $html = Html::beginTag('div', ['class' => $this->classContainer]);
        $html .= Html::beginTag('div', ['class' => 'row', 'id' => 'comments']);
        $html .= Html::beginTag('div', ['class' => 'col-full']);
        $html .= html::tag('h3', 'Обсуждений ('.$countComment.')', ['class' => $this->classTitleContainer]);
        $html .= $this->getOl();
        $html .= Html::endTag('div');
        $html .= Html::endTag('div');
        $html .= Html::endTag('div');
        return $html;
    }

    protected function getOl()
    {
        $html = Html::beginTag('ol', ['class' => $this->classOl]);
//        $html .= $this->getTree($this->comments);
        $html .= Html::endTag('ol');
        return $html;
    }


    protected function getAvatar($icon)
    {
        $html = Html::beginTag('div', ['class' => 'comment__avatar']);
        $html .= Html::img($icon, ['width' => '50', 'height' => '50', 'class' => 'avatar']);
        $html .= Html::endTag('div');
        return $html;
    }

    protected function getContent($name, $date)
    {
        $html = Html::beginTag('div', ['class' => 'comment__info']);
        $html .= Html::tag('cite', $name);
        $html .= Html::beginTag('div', ['class' => 'comment__meta']);
        $html .= Html::tag('time', $date, ['class' => 'comment__time']);
        $html .= Html::a('Ответить', '#', ['class' => 'reply']);
        $html .= Html::endTag('div');
        $html .= Html::endTag('div');
        return $html;
    }

    protected function getText($text)
    {
        $html = Html::beginTag('div', ['class' => 'comment__text']);
        $html .= Html::tag('p', $text);
        $html .= Html::endTag('div');
        return $html;
    }
}

?>


<!---->
<!--        <!-- commentlist -->-->
<!--        <ol class="commentlist">-->
<!---->
<!--            <li class="comment">-->
<!---->
<!--                <div class="comment__avatar">-->
<!--                    <img width="50" height="50" class="avatar" src="/images/avatars/user-04.jpg" alt="">-->
<!--                </div>-->
<!---->
<!--                <div class="comment__content">-->
<!---->
<!--                    <div class="comment__info">-->
<!--                        <cite>John Doe</cite>-->
<!---->
<!--                        <div class="comment__meta">-->
<!--                            <time class="comment__time">Dec 16, 2017 @ 24:05</time>-->
<!--                            <a class="reply" href="#0">Reply</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                    <div class="comment__text">-->
<!--                        <p>Sumo euismod dissentiunt ne sit, ad eos iudico qualisque adversarium, tota falli et mei. Esse-->
<!--                            euismod-->
<!--                            urbanitas ut sed, et duo scaevola pericula splendide. Primis veritus contentiones nec ad,-->
<!--                            nec et-->
<!--                            tantas semper delicatissimi.</p>-->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!---->
<!--                <ul class="children">-->
<!---->
<!--                    <li class="comment">-->
<!---->
<!--                        <div class="comment__avatar">-->
<!--                            <img width="50" height="50" class="avatar" src="/images/avatars/user-03.jpg" alt="">-->
<!--                        </div>-->
<!---->
<!--                        <div class="comment__content">-->
<!---->
<!--                            <div class="comment__info">-->
<!--                                <cite>Kakashi Hatake</cite>-->
<!---->
<!--                                <div class="comment__meta">-->
<!--                                    <time class="comment__time">Dec 16, 2017 @ 25:05</time>-->
<!--                                    <a class="reply" href="#0">Reply</a>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                            <div class="comment__text">-->
<!--                                <p>Duis sed odio sit amet nibh vulputate-->
<!--                                    cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit amet nibh-->
<!--                                    vulputate-->
<!--                                    cursus a sit amet mauris</p>-->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!---->
<!--                        <ul class="children">-->
<!---->
<!--                            <li class="depth-3 comment">-->
<!---->
<!--                                <div class="comment__avatar">-->
<!--                                    <img width="50" height="50" class="avatar" src="/images/avatars/user-04.jpg" alt="">-->
<!--                                </div>-->
<!---->
<!--                                <div class="comment__content">-->
<!---->
<!--                                    <div class="comment__info">-->
<!--                                        <cite>John Doe</cite>-->
<!---->
<!--                                        <div class="comment__meta">-->
<!--                                            <time class="comment__time">Dec 16, 2017 @ 25:15</time>-->
<!--                                            <a class="reply" href="#0">Reply</a>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!---->
<!--                                    <div class="comment__text">-->
<!--                                        <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt-->
<!--                                            saepius. Claritas est-->
<!--                                            etiam processus dynamicus, qui sequitur mutationem consuetudium-->
<!--                                            lectorum.</p>-->
<!--                                    </div>-->
<!---->
<!--                                </div>-->
<!---->
<!--                            </li>-->
<!---->
<!--                        </ul>-->
<!---->
<!--                    </li>-->
<!---->
<!--                </ul>-->
<!---->
<!--            </li> <!-- end comment level 1 -->-->
<!---->
<!---->
<!--        </ol> <!-- end commentlist -->-->
<!--    </div>-->
<!--</div>-->
<!---->
