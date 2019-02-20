<?php

namespace backend\controllers;

use Yii;
use common\models\information;
use backend\models\InformationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InformationController implements the CRUD actions for information model.
 */
class InformationController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new InformationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Information();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            yii::$app->response->refresh();
        }
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model'=>$model,
            'searchModel' => $searchModel,
        ]);
    }


    /**
     * @param $id
     * @return array|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        if (isset($_POST['hasEditable'])) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $model = $this->findModel($id);
            if (yii::$app->request->isAjax) {
                $model->value = yii::$app->request->post('information');
                if ($model->save()){
                    return ['output'=>'', 'message'=>'','values'=>$model->value];
                }
            }
            return ['output'=>'', 'message'=>'При сохранении произошла ошибка, попробуйте ещё раз.'];
        }
        return $this->redirect(Yii::$app->request->referrer);
    }
    /**
     * Finds the information model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return information the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = information::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
