<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 18.01.2019
 * Time: 17:32
 */

namespace frontend\controllers;


use common\models\Post;
use common\models\query\PostQuery;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

/**
 * Class PostsController
 * @package frontend\controllers
 */
class PostsController extends Controller
{

    /**
     * @param string $id
     * @return string
     * @throws HttpException
     */
    public function actionLesson($id)
    {
        $model = $this->postModel($id);

        return $this->render('lesson', ['model' => $model]);
    }

    /**
     * @param string $id
     * @return array|Post|\yii\db\ActiveRecord|null
     * @throws HttpException
     */
    protected function postModel($id)
    {
        if (($model = PostQuery::getOneModel(['id_post'=>$id])) !== null) {
            return $model;
        }
        throw new NotFoundHttpException();
    }

    /**
     * @param string $search
     * @return string
     */
    public function actionLecture($search = 'все записи')
    {
        $category = 'Лекции';
        if ($search == 'все записи') {
            $query = PostQuery::getAllByType('type != 2');
        } else {
            $query = PostQuery::getByTypeLikeTitle('type != 2',$search);
        }
        $pagesPosts = PostQuery::getPagesPosts($query);
        return $this->render('category', ['posts' => $pagesPosts[1],
                'pages' => $pagesPosts[0],
                'category' => $category,
                'params' => $search]
        );
    }

    /**
     * @param string $search
     * @return string
     */
    public function actionAudioLecture($search = 'все записи')
    {
        $category = 'Аудио лекции';
        if ($search == 'все записи') {
            $query = PostQuery::getAllByType('type = 2');
        } else {
            $query = PostQuery::getByTypeLikeTitle('type = 2',$search);
        }
        $pagesPosts = PostQuery::getPagesPosts($query);
        return $this->render('category', ['posts' => $pagesPosts[1],
                'pages' => $pagesPosts[0],
                'category' => $category,
                'params' => $search]
        );
    }

    /**
     * @param string $search
     * @return string
     */
    public function actionSearch($search)
    {
        $category = 'Все типы лекций.';
        $query = PostQuery::getModelLikeTitle($search);
        $pagesPosts = PostQuery::getPagesPosts($query);
        return $this->render('category', ['posts' => $pagesPosts[1],
                'pages' => $pagesPosts[0],
                'category' => $category,
                'params' => $search]
        );
    }


    /**
     * @param string $search
     * @return string
     */
    public function actionTags($search)
    {
        $category = 'Теги.';
        $query = PostQuery::getLikeTag($search);
        $pages = PostQuery::getPagesPosts($query);
        return $this->render('category', ['posts' => $pages[1],
                'pages' => $pages[0],
                'category' => $category,
                'params' => $search]
        );
    }

}