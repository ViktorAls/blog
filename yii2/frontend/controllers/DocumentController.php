<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 30.01.2019
 * Time: 15:05
 */

namespace frontend\controllers;


use common\models\query\DocumentQuery;
use Yii;
use yii\web\Controller;

class DocumentController extends Controller
{

    public function actionIndex($search = '',$tag='')
    {
        if ($search == '' && $tag == '') {
            $query = DocumentQuery::getAll();
        } else {
            $query = DocumentQuery::getLikeTitle($search,$tag);
        }
        $searchParams = $search ==''?'':' Название документа: '.$search.'. ';
        $searchParams .= $tag == ''?'':' Тег: '.$tag;
        $searchParams = $searchParams == ''? ' Все документы ' :$searchParams.'. ';
        $pagesDocument = DocumentQuery::getPagesDocument($query);
        return $this->render('index', [
                'documents' => $pagesDocument[1],
                'pages' => $pagesDocument[0],
                'searchParams'=>$searchParams,
            ]
        );
    }

//    public function actionDownload($file=null){
//
//        if (file_exists(Yii::getAlias('@document').'/'.$file)){
//
//        }
//        $file = Yii::getAlias('@iconDocument').'/txt.svg';
//        return Yii::$app->response->sendFile($file);
//
//    }
}