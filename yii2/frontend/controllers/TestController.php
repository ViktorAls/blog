<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 18.02.2019
 * Time: 22:08
 */

namespace frontend\controllers;


use common\models\query\TestQuery;
use yii\web\Controller;

class TestController extends Controller
{

    public function actionIndex($lesson = 0,$search=''){
        if ($search === '' && $lesson <= 0) {
            $query = TestQuery::getAll();
        } else {
            $query = TestQuery::getLikeTitle($search,$lesson);
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

}