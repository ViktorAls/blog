<?php

namespace backend\controllers;

use backend\models\LoginForm;
use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends AccessController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','save','delete'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    /**
     *
     * @throws NotFoundHttpException
     */
    public function actionSave()
    {
        if (Yii::$app->request->isAjax) {
            $user = User::findOne(['id' =>3]);
            if (isset($user)) {
                $user->push_token = Yii::$app->request->post('push_token');
                $user->save();
            }
        } else {
            throw new NotFoundHttpException('Страница отсутствует.','404');
        }
    }

    /**
     *
     * @throws NotFoundHttpException
     */
    public function actionDelete()
    {
        if (Yii::$app->request->isAjax) {
            $user = User::findOne(['id' => 3]);
            if (isset($user)) {
                $user->push_token = Null;
                $user->save();
            }
        } else {
            throw new NotFoundHttpException('Страница отсутствует.','404');
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
