<?php

namespace backend\controllers;

use backend\models\PostSearch;
use common\models\post;
use common\models\PostFile;
use common\models\query\LessonQuery;
use common\models\query\TagQuery;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PostController implements the CRUD actions for post model.
 */
class PostController extends Controller
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
     * Lists all post models.
     * @param int $type
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $lessonFilter = ArrayHelper::map(LessonQuery::getAll(), 'id', 'name');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'lessonFilter' => $lessonFilter,

        ]);
    }

    /**
     * Displays a single post model.
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
     * Finds the post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id))!==null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $tagFilter = ArrayHelper::map(TagQuery::getAll(), 'id', 'name');
        $lessonFilter = ArrayHelper::map(LessonQuery::getAll(), 'id', 'name');

        return $this->render('create', [
            'model' => $model,
            'lessonFilter' => $lessonFilter,
            'tagFilter' => $tagFilter,
        ]);
    }

    /**
     * Updates an existing post model.
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
        $tagFilter = ArrayHelper::map(TagQuery::getAll(), 'id', 'name');
        $lessonFilter = ArrayHelper::map(LessonQuery::getAll(), 'id', 'name');

        return $this->render('update', [
            'model' => $model,
            'lessonFilter' => $lessonFilter,
            'tagFilter' => $tagFilter,
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
     * @return bool
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDeleteImg()
    {
        if ($model = PostFile::findOne(yii::$app->request->post('key'))) {
            $dir = yii::getAlias('@imagesPost') . '/' . $model->id . '/' . $model->name;
            if (is_file($dir)) {
                unlink($dir);
            }
            $model->delete();
            return true;
        }
        throw new NotFoundHttpException('Ошибка в удалении файла');
    }
}
