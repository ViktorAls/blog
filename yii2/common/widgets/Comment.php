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
use yii\helpers\Url;

class Comment extends Widget
{

    /**
     * @var array
     */
    public $comments;

    /**
     * @var string
     */
    public $classContainer = 'comments-wrap';
    /**
     * @var string
     */
    public $classTitleContainer = 'h2';

    /**
     * @var string
     */
    public $classUlChildren = 'children';

    /**
     * @var string
     */
    public $classLiComment = 'comment';

    /**
     * @var string
     */
    public $classAvatar = 'avatar';

    /**
     * @var string
     */
    public $classOl = 'commentlist';

    /**
     * @var string
     */
    public $formatDate = 'M d, Y @ H:i';

    public $pathIcon = 'uploads/user/';

    /**
     * @param array $comments
     * @return int
     */
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


    public function run()
    {
        $countComment = $this->countComment($this->comments);
        $html = Html::beginTag('div', ['class' => $this->classContainer]);
        $html .= Html::beginTag('div', ['class' => 'row', 'id' => 'comments']);
        $html .= Html::beginTag('div', ['class' => 'col-full']);
        $html .= html::tag('h3', 'Обсуждений (' . $countComment . ')', ['class' => $this->classTitleContainer]);
        $html .= Html::beginTag('ol', ['class' => $this->classOl]);
        $html .= $this->getTree($this->comments);
        $html .= Html::endTag('ol');
        $html .= Html::endTag('div');
        $html .= Html::endTag('div');
        $html .= Html::endTag('div');
        return $html;
    }

    /**
     * @param $icon
     * @return string
     */
    protected function getAvatar($icon)
    {
        $icon = Url::home(true).$this->pathIcon.$icon;
        $html = Html::beginTag('div', ['class' => 'comment__avatar']);
        $html .= Html::img($icon, ['width' => '50', 'height' => '50', 'class' => $this->classAvatar]);
        $html .= Html::endTag('div');
        return $html;
    }

    /**
     * @param string $name
     * @param int $date
     * @param string $text
     * @return string
     */
    protected function getContent($name, $date, $text)
    {
        $html = Html::beginTag('div', ['class' => 'comment__content']);
        $html .= $this->getInfo($name, $date);
        $html .= $this->getText($text);
        $html .= Html::endTag('div');
        return $html;
    }

    /**
     * @param string $name
     * @param string $date
     * @return string
     */
    protected function getInfo($name, $date)
    {
        $dateF = date($this->formatDate,strtotime($date));
        $html = Html::beginTag('div', ['class' => 'comment__info']);
        $html .= Html::tag('cite', $name);
        $html .= Html::beginTag('div', ['class' => 'comment__meta']);
        $html .= Html::tag('time', $dateF, ['class' => 'comment__time']);
        $html .= Html::a('Ответить', '#', ['class' => 'reply']);
        $html .= Html::endTag('div');
        $html .= Html::endTag('div');
        return $html;
    }

    /**
     * @param string $text
     * @return string
     */
    protected function getText($text)
    {
        $html = Html::beginTag('div', ['class' => 'comment__text']);
        $html .= Html::tag('p', $text);
        $html .= Html::endTag('div');
        return $html;
    }

    public function getTree($items, $parentId = 0)
    {
        $html = null;
        foreach ($items as $item) {
            if ($item['id_parent'] == $parentId) {
                $html .= Html::beginTag('li', ['class' => $this->classLiComment]);
                $html .= $this->getAvatar($item['user']['icon']);
                $name = $item['user']['patronymic'].' '.$item['user']['name'].' '.$item['user']['middlename'];
                $text = Html::encode($item['text']);
                $html .= $this->getContent($name,$item['created_at'],$text);
                if ($this->isChildren($items,$item['id_comment'])) {
                    $html .= Html::beginTag('ul',['class'=>$this->classUlChildren,'style'=>"border-left:0.5px solid #6DDFFF;"]);
                    $html .= $this->getTree($items, $item['id_comment']);
                    $html .= Html::endTag('ul');
                }
                $html .= Html::endTag('li');
            }
        }
        return $html;
    }

        public function isChildren($items, $values)
        {
            foreach ($items as $value) {
                if ($value['id_parent'] == $values) {
                    return true;
                }
            }
            return false;
        }
    }