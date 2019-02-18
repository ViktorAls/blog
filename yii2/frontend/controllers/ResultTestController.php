<?php

namespace frontend\controllers;

use common\models\query\TestQuery;
use Yii;
use common\models\resultTest;
use frontend\models\resultTestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ResultTestController implements the CRUD actions for resultTest model.
 */
class ResultTestController extends Controller
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

    /**
     * Lists all resultTest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new resultTestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $filterTest = TestQuery::getTest();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'filterTest'=>$filterTest,
        ]);
    }

    /**
     * Finds the resultTest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return resultTest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = resultTest::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
