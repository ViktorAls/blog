<?php

namespace backend\controllers;

use Yii;
use backend\models\task;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TaskController implements the CRUD actions for task model.
 */
class TaskController extends AccessController
{
    /**
     * Lists all task models.
     * @return mixed
     */
    public function actionIndex()
    {
        $tasks1 = Task::find()->orderBy(['date_end' => SORT_DESC])->with('user')->where(['priority'=>'1'])->asArray()->all();
        $tasks2 = Task::find()->orderBy(['date_end' => SORT_DESC])->with('user')->where(['priority'=>'2'])->asArray()->all();
        $tasks3 = Task::find()->orderBy(['date_end' => SORT_DESC])->with('user')->where(['priority'=>'3'])->asArray()->all();

        return $this->render('index', [
            'tasks1' => $tasks1,
            'tasks2' => $tasks2,
            'tasks3' => $tasks3,
        ]);
    }

    /**
     * Displays a single task model.
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
     * Creates a new task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new task();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing task model.
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

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
    }

    /**
     * Finds the task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = task::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
