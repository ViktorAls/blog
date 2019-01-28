<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 18.01.2019
 * Time: 19:41
 */

namespace common\widgets;


use yii\base\Widget;

class PhotoPost extends Widget
{
    /**
     * @var string
     */
    public $pathPhoto = 'uploads/post/';

    /**
     * @var string
     */
    public $pathIcon = 'uploads/icon/';

    /**
     * @var array
     */
    public $data;

    /**
     * @var string
     */
    public $icon;

    /**
     * @return string
     */
    public function run()
    {
        return $this->render('photo',[
            'pathPhoto'=>$this->pathPhoto,
            'data'=>$this->data,
            'pathIcon'=>$this->pathIcon,
            'icon'=>$this->icon
        ]);
    }
}