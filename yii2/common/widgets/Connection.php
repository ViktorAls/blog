<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 18.01.2019
 * Time: 1:08
 */

namespace common\widgets;


use common\models\Information;
use common\models\query\InformationQuery;
use kartik\popover\PopoverX;
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
     * @throws \Exception
     */
    public function run()
    {
        $html = '';
        $connection = InformationQuery::getMessenger();
        $html .= html::beginTag('ul',['class'=>$this->ulClass]);
        $html .= $this->getLi('ВКонтакте',$connection['vkontakte']['value'],'fab fa-vk');
        $html .= $this->getLi('Mail почта',$connection['mail']['value'],'fas fa-at');
        $html .= $this->getLi('Facebook',$connection['facebook']['value'],'fab fa-facebook-f');
        $html .= Html::endTag('ul');
        return $html;
    }

    /**
     * @param $title
     * @param string $iClass
     * @param string $content
     * @return string
     * @throws \Exception
     */
    public function getLi($title,$content,$iClass){
        $html='';
        $html .= Html::beginTag('li');
        $html .= PopoverX::widget([
            'header' => $title,
            'placement' => PopoverX::ALIGN_RIGHT,
            'content' => $content,
            'closeButton'=>['tag'=>'a'],
            'toggleButton' => [
                'label' => '<i class="'.$iClass.'" aria-hidden="true"></i>',
                'tag' => 'a',
            ],
        ]);
        $html .= Html::endTag('li');
        return $html;
    }

}
