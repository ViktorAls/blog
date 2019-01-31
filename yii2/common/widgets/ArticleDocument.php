<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 30.01.2019
 * Time: 19:57
 */

namespace common\widgets;


use yii\base\Widget;

class articleDocument extends Widget
{

    /**
     * @var integer
     */
    public $idPost;

    /**
     * @var string
     */
    public $nameIcon;

    /**
     * @var DateTime
     */
    public $datePublication;
    /**
     * @var string
     */
    public $title;

    /**
     * @var array
     */
    public $tags;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $getParamsPost = 'id';

    /**
     * @var string
     */
    public $fullActionPost = 'posts/lesson';

    /**
     * @var string
     */
    public $formatDate = 'F d, Y';

    /**
     * @var string
     */
    public $getParamsTag = 'search';

    /**
     * @var string
     */
    public $fullActionTags ='posts/tags';


    /**
     * @var string
     */
    public $pathIcon ='/uploads/icon/';



    public function run (){

        return $this->render('document',['']);
    }
}