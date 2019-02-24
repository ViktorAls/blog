<?php

namespace backend\controllers;

use common\models\query\TestQuery;
use common\models\Test;
use Yii;
use common\models\question;
use backend\models\QuestionSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuestionController implements the CRUD actions for question model.
 */
class QuestionController extends Controller
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
     * Lists all question models.
     * @param $test
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionIndex($test)
    {
        $name = $this->findTestModel($test);
        $searchModel = new QuestionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$test);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'name'=>$name,
        ]);
    }

    /**
     * Displays a single question model.
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
     * Creates a new question model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new question();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'test' => $model->id_test]);
        }
        $testFilter = ArrayHelper::map(TestQuery::getArrayAll(),'id','title');

        return $this->render('create', [
            'model' => $model,
            'testFilter'=>$testFilter,
        ]);
    }

    /**
     * Updates an existing question model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'test' => $model->id_test]);
        }

        $testFilter = ArrayHelper::map(TestQuery::getArrayAll(),'id','title');

        return $this->render('update', [
            'model' => $model,
            'testFilter'=>$testFilter,
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
     * Finds the question model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return question the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Question::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Запрашиваемая страница не существует.');
    }

    /**
     * @param $id
     * @return bool
     * @throws NotFoundHttpException
     */
    protected function findTestModel($id)
    {
        if (($name = Test::findOne($id)) !== null) {
            return $name['title'];
        }

        throw new NotFoundHttpException('Запрашиваемая страница не существует.');
    }
}
