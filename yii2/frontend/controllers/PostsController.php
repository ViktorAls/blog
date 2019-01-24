<?php
/**
 * Created by PhpStorm.
 * User: vipvi_mc4
 * Date: 18.01.2019
 * Time: 17:32
 */

namespace frontend\controllers;


use common\models\Post;
use common\models\Tag;
use common\models\TagPost;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
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
     * @param $id
     * @return string
     * @throws HttpException
     */
    public function actionLesson($id)
    {
        $model = $this->postModel($id);

        return $this->render('lesson', ['model' => $model]);
    }

    /**
     * @param $id
     * @return array|Post|\yii\db\ActiveRecord|null
     * @throws HttpException
     */
    protected function postModel($id)
    {
        if (($model = Post::find()->where(['id_post' => $id])->asArray()->with('tags', 'file')->one()) !== null) {
            return $model;
        }
        throw new NotFoundHttpException();
    }

    public function actionLecture($search = null)
    {
        $category = 'Лекции';
        if ($search == null) {
            $search = 'все записи';
            $query = Post::find()->where('type != 2');
        } else {
            $query = Post::find()->where('type != 2')->andWhere(['like', 'title', $search]);
        }
        $pagesPosts = $this->PagesPosts($query);
        return $this->render('category', ['posts' => $pagesPosts[1],
                'pages' => $pagesPosts[0],
                'category' => $category,
                'params' => $search]
        );
    }

    public function actionAudioLecture($search = null)
    {
        $category = 'Аудио лекции';
        if ($search == null) {
            $search = 'все записи';
            $query = Post::find()->where('type = 2');
        } else {
            $query = Post::find()->where('type = 2')->andWhere(['like', 'title', $search]);
        }
        $pagesPosts = $this->PagesPosts($query);
        return $this->render('category', ['posts' => $pagesPosts[1],
                'pages' => $pagesPosts[0],
                'category' => $category,
                'params' => $search]
        );
    }

    public function actionSearch($search)
    {
        $category = 'Все типы лекций.';
        $query = Post::find()->andWhere(['like', 'title', $search]);
        $pagesPosts = $this->PagesPosts($query);
        return $this->render('category', ['posts' => $pagesPosts[1],
                'pages' => $pagesPosts[0],
                'category' => $category,
                'params' => $search]
        );
    }

    /**
     * @param $query
     * @return array
     */
    public function PagesPosts($query)
    {
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()
            ->with('tags')
            ->orderBy(['id_post' => SORT_DESC])
            ->all();
        return [$pages, $posts];
    }

    public function actionTags($search)
    {
        $category = 'Теги.';
        $query = Post::find()->joinWith('tags')->where(['like', 'tag.name', $search]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9]);
        $posts = $query->asArray()
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('category', ['posts' => $posts,
                'pages' => $pages,
                'category' => $category,
                'params' => $search]
        );
    }

}