<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 07.02.2019
 * Time: 12:57
 */

namespace frontend\controllers;


use yii\web\Controller;

class UserController extends Controller
{

    public  function actionSettings(){

        return $this->renderAjax('settings');
    }
}