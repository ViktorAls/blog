<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 30.01.2019
 * Time: 15:05
 */

namespace frontend\controllers;


use common\models\query\DocumentQuery;
use yii\web\Controller;

class DocumentController extends Controller
{

    public function actionIndex($search = 'все документы'){
        if ($search == 'все документы') {
            $query = DocumentQuery::getAll();
        } else {
            $query = DocumentQuery::getLikeTitle($search);
        }
        $pagesDocument = DocumentQuery::getPagesDocument($query);
        return $this->render('index', ['posts' => $pagesDocument[1],
                'pages' => $pagesDocument[0],
                'params' => $search
            ]
        );
    }
}