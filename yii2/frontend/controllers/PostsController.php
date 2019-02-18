<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 18.01.2019
 * Time: 17:32
 */

namespace frontend\controllers;


use common\models\Post;
use common\models\query\LessonQuery;
use common\models\query\PostQuery;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;

/**
 * Class PostsController
 * @package frontend\controllers
 */
class PostsController extends AccessController
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
        if (($model = PostQuery::getOneModel(['post.id' => $id],
                [
                    'postFiles', 'tags',
                    'comments.user' => function ($query) {
                        $query->select('id,icon,name,middlename,patronymic');
                    },
                ]
            ))!==null) {
            return $model;
        }
        throw new NotFoundHttpException();
    }

    /**
     * @param string $search
     * @param int $lesson
     * @return string
     */
    public function actionLecture($search = '', $lesson = 0)
    {
        if ($search==='' && $lesson===0) {
            $query = PostQuery::getAllByType('type != 2');
        } else {
            $query = PostQuery::getByTypeLikeTitle('type != 2', $search, $lesson);
        }
        $category = $search==='' ? '' : 'Заголовок:' . $search . '. ';
        $category .= $lesson==='' ? '' : 'Лекция: ' . LessonQuery::getTitle($lesson) . '. ';
        $category = $category==='' ? 'Все записи.' : $category;
        $pagesPosts = PostQuery::getPagesPosts($query);
        return $this->render('category', ['posts' => $pagesPosts[1],
                'pages' => $pagesPosts[0],
                'category' => $category,
                'section' => 'Лекции',
            ]
        );
    }

    /**
     * @param string $search
     * @param int $lesson
     * @return string
     */
    public function actionAudioLecture($search = '', $lesson = 0)
    {
        if ($search==='' && $lesson===0) {
            $query = PostQuery::getAllByType('type = 2');
        } else {
            $query = PostQuery::getByTypeLikeTitle('type = 2', $search, $lesson);
        }
        $category = $search==='' ? '' : 'Заголовок:' . $search . '. ';
        $category .= $lesson==='' ? '' : 'Лекция: ' . LessonQuery::getTitle($lesson) . '. ';
        $category = $category==='' ? 'Все записи.' : $category;
        $pagesPosts = PostQuery::getPagesPosts($query);
        return $this->render('category', ['posts' => $pagesPosts[1],
                'pages' => $pagesPosts[0],
                'category' => $category,
                'section' => 'Аудио лекции',
            ]
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
        return $this->render('category',
            [
                'posts' => $pagesPosts[1],
                'pages' => $pagesPosts[0],
                'category' => $category,
                'params' => $search
            ]
        );
    }


    /**
     * @param string $search
     * @return string
     */
    public function actionTags($tag, $search = '')
    {
        $category = 'Тег: ' . $tag;
        $query = PostQuery::getLikeTag($tag, $search);
        $category = $search==='' ? $search = 'Все записи ' . $category : 'Заголовок записи: ' . $search . ' ' . $category;
        $pages = PostQuery::getPagesPosts($query);
        return $this->render('category', ['posts' => $pages[1],
                'pages' => $pages[0],
                'category' => $category,
                'params' => $search,
                'section' => 'Теги',
            ]
        );
    }

}