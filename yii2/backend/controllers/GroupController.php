<?php

namespace backend\controllers;

use Yii;
use common\models\group;
use backend\models\GroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupController implements the CRUD actions for group model.
 */
class GroupController extends Controller
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
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Group();
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
                $model->name = yii::$app->request->post('group');
                if ($model->save()){
                    return ['output'=>'', 'message'=>'','values'=>$model->name];
                }
            }
            return ['output'=>'', 'message'=>'При сохранении произошла ошибка, попробуйте ещё раз.'];
        }
        return $this->redirect(Yii::$app->request->referrer);
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
     * Finds the group model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return group the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Group::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
