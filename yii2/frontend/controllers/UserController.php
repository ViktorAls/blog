<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 07.02.2019
 * Time: 12:57
 */

namespace frontend\controllers;


use frontend\models\ProfileSettingsForm;
use frontend\models\query\UserQuery;
use Yii;
use yii\web\Controller;

class UserController extends Controller
{

    /**
     * @return string|\yii\web\Response
     * @throws \yii\base\Exception
     */
    public  function actionSettings(){
        $model = new ProfileSettingsForm();
        $user = UserQuery::getOpenInformation();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->saveIcon($user['icon'])) {
                Yii::$app->session->setFlash('success', 'Аватарка изменена');
            } else {
                Yii::$app->session->setFlash('error', 'К сожалению,произошла ошибка, попробуйте ещё раз.');
            }
            return $this->redirect(Yii::$app->request->referrer);
        }
        return $this->renderAjax('settings',['model'=>$model,'user'=>$user]);
    }
}