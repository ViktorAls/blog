<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 18.02.2019
 * Time: 22:08
 */

namespace frontend\controllers;


use yii\web\Controller;

class TestController extends Controller
{

    public function actionIndex($lesson='',$search=''){

        return $this->render('index');
    }

}