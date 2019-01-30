<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 30.01.2019
 * Time: 15:05
 */

namespace frontend\controllers;


use yii\web\Controller;

class DocumentController extends Controller
{

    public function actionIndex($search = 'все документы'){
        if ($search == 'все документы') {
            $query = PostQuery::getAllByType('type != 2');
        } else {
            $query = PostQuery::getByTypeLikeTitle('type != 2',$search);
        }
        $pagesPosts = PostQuery::getPagesPosts($query);
        return $this->render('category', ['posts' => $pagesPosts[1],
                'pages' => $pagesPosts[0],
                'params' => $search]
        );
    }
}