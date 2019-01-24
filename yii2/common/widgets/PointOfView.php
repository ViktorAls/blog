<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 18.01.2019
 * Time: 12:44
 */

namespace common\widgets;


use common\models\Information;
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
        $PointOfView = Information::find()->asArray()->where(['name'=>'pointOfView'])->one();
        $html='';
        $html .= Html::tag('h3',$this->title);
        $html .= Html::tag('p',$PointOfView['value']);
        return $html;
    }

}