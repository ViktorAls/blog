<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 18.01.2019
 * Time: 19:41
 */

namespace common\widgets;


use yii\base\Widget;


class AudioPost extends Widget
{
    /**
     * @var string
     */
    public $pathAudio = 'uploads/audio/';

    /**
     * @var string
     */
    public $pathIcon ='uploads/icon/';

    /**
     * @var string
     */
    public $icon;

    /**
     * @var array
     */
    public $data;

    /**
     * @return string
     */
    public function run()
    {
       return $this->render('audio', [
           'pathAudio'=>$this->pathAudio,
           'data'=>$this->data,
           'pathIcon'=>$this->pathIcon,
           'icon'=>$this->icon
       ]);
    }
}