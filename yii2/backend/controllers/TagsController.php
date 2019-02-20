<?php

namespace backend\controllers;

use Yii;
use common\models\tag;
use backend\models\TagsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TagsController implements the CRUD actions for tag model.
 */
class TagsController extends Controller
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
        $searchModel = new TagsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Tag();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            yii::$app->response->refresh();
        }
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model'=>$model,
        ]);
    }



    public function actionUpdate($id)
    {
        if (isset($_POST['hasEditable'])) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $model = $this->findModel($id);
            if (yii::$app->request->isAjax) {
                $model->name = yii::$app->request->post('tags');
                if ($model->save()){
                    return ['output'=>'', 'message'=>'','values'=>$model->name];
                } else
                    return ['output'=>'', 'message'=>'При сохранении произошла ошибка, попробуйте ещё раз.'];
            }
        }
    }


    /**
     * Displays a single tag model.
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
     * Deletes an existing tag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the tag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return tag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = tag::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
