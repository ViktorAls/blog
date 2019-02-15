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
        return $this->render('header', [
                'logoName'=>$this->logoName,
                'urlLogo'=>$this->urlLogo,
                'liDocument'=>$this->liDocument(),
                'connectionWidget'=>$this->connectionWidget,
            ]
        );
    }

    public function liDocument()
    {
        $html=null;
        $documents = LessonQuery::headerDocument();
        foreach ($documents as $document) {
            $html .= Html::beginTag('li');
            $html .= Html::a($document['title'],$document['url']);
            $html .= Html::endTag('li');
        }
        return $html;
    }

}