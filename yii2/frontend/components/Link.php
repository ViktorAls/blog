<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 16.01.2019
 * Time: 14:05
 */

namespace frontend\components;


use yii\base\Component;
use yii\helpers\Html;
use yii\helpers\Url;

class Link extends Component
{
    /**
     * @param int $type
     * @return string
     */
    public function Link($type)
    {

        if ($type == 1) {
            $answer = Url::to(['posts/photo']);
        } else if ($type == 2) {
            $answer = Url::to(['posts/audio']);
        } else if ($type == 3) {
            $answer = Url::to(['posts/video']);
        }
        return $answer;
    }

}