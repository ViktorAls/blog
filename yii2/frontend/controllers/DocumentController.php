<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 30.01.2019
 * Time: 15:05
 */

namespace frontend\controllers;


use common\models\query\DocumentQuery;
use common\models\query\LessonQuery;
use frontend\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

class DocumentController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','download'],
                'rules' => [
                    [
                        'actions' => ['index','download'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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

    public function actionIndex($lesson = 0,$search = '', $tag = '')
    {
        if ($search === '' && $tag === '' && $lesson <= 0) {
            $query = DocumentQuery::getAll();
        } else {
            $query = DocumentQuery::getLikeTitle($search, $tag,$lesson);
        }
        $searchParams = $lesson <= 0 ? '' : 'Предмет: '.LessonQuery::getTitle($lesson).'.';
        $searchParams .= $search === '' ? '' : ' Название документа: ' . $search . '. ';
        $searchParams .= $tag === '' ? '' : ' Тег: ' . $tag.'.';
        $searchParams = $searchParams === '' ? ' Все документы ' : $searchParams;
        $pagesDocument = DocumentQuery::getPagesDocument($query);
        return $this->render('index', [
                'documents' => $pagesDocument[1],
                'pages' => $pagesDocument[0],
                'searchParams' => $searchParams,
            ]
        );
    }

    /**
     * @param $file
     * @return \yii\console\Response|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionDownload($file)
    {
        $file = urlencode($file);

        if (file_exists(Yii::getAlias('@document') . '/' . $file)) {
            $file = Yii::getAlias('@document') . '/' . $file;
            return Yii::$app->response->sendFile($file);
        }
        throw new NotFoundHttpException('Файл не найден, возможно он был удалён.');
    }

}