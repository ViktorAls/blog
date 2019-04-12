<?php

namespace backend\controllers;

use common\models\query\GroupQuery;
use Yii;
use common\models\user;
use backend\models\UserSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for user model.
 */
class UserController extends AccessController
{
    /**
     * Lists all user models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $groupFilter = ArrayHelper::map(GroupQuery::getGroupAll(),'id','name');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'groupFilter'=>$groupFilter,
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionAdmin($id){
        $allow = 'учащийся';
        $model = $this->findModel($id);
        if($model->success === 1){
            $model->success = 0;
        } else {
            $model->success = 1;
            $allow = 'администратор';
        }
       if($model->save()){
        Yii::$app->session->setFlash('success',"Права доступа изменены на '$allow'");
       } else {
           Yii::$app->session->setFlash('error','При изменении прав произошла ошибка');
       }
       return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionStatus($id){
        $model = $this->findModel($id);
        if($model->status === 10){
            $model->status = 0;
        } else {
            $model->status = 10;
        }
        if($model->save()){
            Yii::$app->session->setFlash('success','Статус пользователя изменён');
        } else {
            Yii::$app->session->setFlash('error','При изменении статуса произошла ошибка');
        }
        return $this->redirect(['index']);
    }

    /**
     * Creates a new user model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new user();
        $groupFilter = ArrayHelper::map(GroupQuery::getGroupAll(),'id','name');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('error','Пользователь зарегистрирован, ожидает подтверждения.');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'groupFilter'=>$groupFilter,
        ]);
    }

    /**
     * Updates an existing user model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $groupFilter = ArrayHelper::map(GroupQuery::getGroupAll(),'id','name');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','Пользователь зарегестрирован.');
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
            'groupFilter'=>$groupFilter
        ]);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the user model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return user the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
