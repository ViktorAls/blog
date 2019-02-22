<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 14.02.2019
 * Time: 22:15
 */

namespace common\widgets;


use common\models\query\LessonQuery;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class Header extends Widget
{

    /**
     * @var string
     */
    public $logoName;

    /**
     * @var string
     */
    public $urlLogo = '/';

    /**
     * @var bool
     */
    public $connectionWidget = true;

    public function run()
    {
        $lessons = LessonQuery::getAll();
        return $this->render('header', [
                'logoName' => $this->logoName,
                'urlLogo' => $this->urlLogo,
                'liDocument' => $this->getLi($lessons,Url::to(['document/index'])),
                'liAudioLecture' => $this->getLi($lessons,Url::to(['posts/audio-lecture'])),
                'liLecture' => $this->getLi($lessons,Url::to(['posts/lecture'])),
                'liTest' => $this->getLi($lessons,Url::to(['test/index'])),
                'connectionWidget' => $this->connectionWidget,
            ]
        );
    }

    public function getLi($lessons,$url)
    {
        $html = null;
        foreach ($lessons as $lesson) {
            $html .= Html::beginTag('li');
            $html .= Html::a($lesson['name'],Url::to([$url,'lesson'=>$lesson['id']]));
            $html .= Html::endTag('li');
        }
        return $html;
    }
}