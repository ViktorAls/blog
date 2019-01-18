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
     * @var array
     */
    public $data;

    public function run()
    {

        return $this->render('photo',['path'=>$this->pathPhoto,'data'=>$this->data]);
    }
}