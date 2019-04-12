<?php

namespace backend\controllers;

use common\models\query\LessonQuery;
use Throwable;
use Yii;
use common\models\test;
use backend\models\testSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TestController implements the CRUD actions for test model.
 */
class TestController extends AccessController
{
    /**
     * Lists all test models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new testSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $lessonFilter = ArrayHelper::map(LessonQuery::getAll(),'id','name');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'lessonFilter'=>$lessonFilter,
        ]);
    }

    /**
     * Displays a single test model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new test model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new test();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $lessonFilter = ArrayHelper::map(LessonQuery::getAll(),'id','name');

        return $this->render('create', [
            'model' => $model,
            'lessonFilter'=>$lessonFilter,
        ]);
    }

    /**
     * Updates an existing test model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $lessonFilter = ArrayHelper::map(LessonQuery::getAll(),'id','name');

        return $this->render('update', [
            'model' => $model,
            'lessonFilter'=>$lessonFilter,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the test model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return test the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Test::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
