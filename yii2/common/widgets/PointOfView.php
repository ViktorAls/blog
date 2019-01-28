<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 18.01.2019
 * Time: 12:44
 */

namespace common\widgets;


use common\models\query\InformationQuery;
use yii\base\Widget;
use yii\helpers\Html;

class PointOfView extends Widget
{

    /**
     * @var string
     */
    public $title='';

    /**
     * @return string
     */
    public function run()
    {
        $PointOfView = InformationQuery::getPointOfView();
        $html='';
        $html .= Html::tag('h3',$this->title);
        $html .= Html::tag('p',$PointOfView['value']);
        return $html;
    }

}