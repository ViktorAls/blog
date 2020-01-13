<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 18.02.2019
 * Time: 22:08
 */

namespace frontend\controllers;


use common\models\query\QuestionQuery;
use common\models\query\TestQuery;
use common\models\ResultTest;
use common\models\Test;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class TestController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'result', 'passage'],
                'rules' => [
                    [
                        'actions' => ['index', 'result', 'passage'],
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

    public function actionIndex($lesson = 0, $search = '')
    {
        if ($search === '' && $lesson <= 0) {
            $query = TestQuery::getAll();
        } else {
            $query = TestQuery::getLikeTitle($search, $lesson);
        }
        $searchParams = $search === '' ? '' : ' Название теста: ' . $search . '. ';
        $searchParams = $searchParams === '' ? ' Все тесты ' : $searchParams;
        $pagesTest = TestQuery::getPagesTest($query);
        return $this->render('index', [
                'tests' => $pagesTest[1],
                'pages' => $pagesTest[0],
                'searchParams' => $searchParams,
            ]
        );
    }


    /**
     * @param $test
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionPassage($idTest)
    {

        $test = $this->findModelTest($idTest);
        $questions = QuestionQuery::getQuestionTest($test);
        shuffle($questions);
        return $this->render('passage', compact('questions', 'test'));
    }

    /**
     * @param $id
     * @return Test|null
     * @throws NotFoundHttpException
     */
    protected function findModelTest($id)
    {
        if (($model = Test::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param $id
     * @return \yii\web\Response
     */
    public function actionResult($id)
    {
        if (Yii::$app->request->post('buttonAnswer')) {
            if (Yii::$app->request->post('buttonAnswer')) {
                $questions = QuestionQuery::getQuestionTest($id);
                $userAnswer = Yii::$app->request->post('answer');
                $rightCountQuestion = count($questions);
                foreach ($questions as $question) {
                    foreach ($question['answers'] as $answer) {
                        $ans = empty($userAnswer[$question['id']][$answer['id']]);

                        if ($ans === false && $answer['bool'] !== '1') {
                            $rightCountQuestion--;
                            break;
                        }
                        if ($ans === true && $answer['bool'] === '1') {
                            $rightCountQuestion--;
                            break;
                        }
                    }
                }
                $priseOneQuestion = 100 / QuestionQuery::getCount($id);
                $result = new ResultTest();
                $result->id_test = $id;
                $result->result = $rightCountQuestion * $priseOneQuestion;
                $result->id_user = Yii::$app->user->getId();
                $result->date = date('Y-m-d H-m-i');
                if ($result->save()) {
                    yii::$app->session->setFlash('success', 'Результаты успешно сохранены, Ваш результат ' . $rightCountQuestion * $priseOneQuestion) . ' из 100%';
                } else {
                    yii::$app->session->setFlash('error', 'Произошла ошибка сервера.');
                }
            }
            return $this->redirect(['/result-test/index']);
        }
    }
}