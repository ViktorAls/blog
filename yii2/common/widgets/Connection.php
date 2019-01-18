<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 18.01.2019
 * Time: 1:08
 */

namespace common\widgets;


use common\models\Information;
use yii\base\Widget;
use yii\helpers\Html;

class Connection extends Widget
{
    /**
     * @var string
     */
    public $ulClass='header__social';


    /**
     * @return string
     */
    public function run()
    {
        $html = '';
        $connection = Information::find()->indexBy('name')->orWhere(['name'=>'facebook'])
            ->orWhere(['name'=>'mail'])->orWhere(['name'=>'vkontakte'])
            ->asArray()->all();
        $html .= html::beginTag('ul',['class'=>$this->ulClass]);
        $html .= $this->getLi($connection['vkontakte']['value'],'fab fa-vk');
        $html .= $this->getLi($connection['mail']['value'],'fas fa-at');
        $html .= $this->getLi($connection['facebook']['value'],'fab fa-facebook-f');
        $html .= Html::endTag('ul');
        return $html;
    }

    /**
     * @param string $href
     * @param string $iClass
     * @return string
     */
    public function getLi($href,$iClass){
        $html='';
        $html .= Html::beginTag('li');
        $html .= Html::beginTag('a',['href'=>$href]);
        $html .= Html::beginTag('i',['class'=>$iClass,'aria-hidden'=>'true']);
        $html .= Html::endTag('i');
        $html .= Html::endTag('a');
        $html .= Html::endTag('li');
        return $html;
    }
}
//
//<ul class="header__social">
//                <li>
//                    <a href="#0"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
//                </li>
//                <li>
//                    <a href="#0"><i class="fas fa-at" aria-hidden="true"></i></a>
//                </li>
//                <li>
//                    <a href="#0"><i class="fab fa-vk" aria-hidden="true"></i></a>
//                </li>
//            </ul>