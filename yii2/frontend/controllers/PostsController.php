<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 18.01.2019
 * Time: 17:32
 */

namespace frontend\controllers;


use common\models\Post;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\HttpException;

class PostsController extends Controller
{

    /**
     * @param $id
     * @return string
     * @throws HttpException
     */
    public function actionLesson($id){

        $model = $this->postModel($id);

        return $this->render('lesson',['model'=>$model]);
    }

    /**
     * @param $id
     * @return array|Post|\yii\db\ActiveRecord|null
     * @throws HttpException
     */
    protected function postModel ($id){
         if ($model = Post::find()->where(['id_post'=>$id])->asArray()->with('tags','file')->one()){
             return $model;
         } else {
             throw new HttpException('404','Страница не найдена.');
         }
    }

    public function actionLecture(){
        $query = Post::find()->where(['type'=>3]);
        $pages = new Pagination(['totalCount' => $query->count(),'pageSize' => 9]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()
            ->with('tags')
            ->orderBy(['id_post'=>SORT_DESC])
            ->all();
        return $this->render('category',compact('posts','pages'));
    }

    public function actionAudioLecture(){
        return $this->render('category');
    }

    public function actionSearch(){
        return $this->render('category');
    }
}