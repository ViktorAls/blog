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

/**
 * @method asArray()
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
        if ($model = Post::find()->where(['id_post' => $id])->asArray()->with('tags', 'file')->one()) {
            return $model;
        } else {
            throw new HttpException('404', 'Страница не найдена.');
        }
    }

    public function actionLecture($search = null)
    {
        $category = 'Лекции';
        if ($search == null) {
            $params = 'все записи';
            $query = Post::find()->where('type != 2');
        } else {
            $params = $search;
            $query = Post::find()->where('type != 2')->andWhere(['like','title',$search]);
        }
        $pagesPosts = $this->PagesPosts($query);
        return $this->render('category',['posts'=>$pagesPosts[1],
                'pages'=>$pagesPosts[0],
                'category'=>$category,
                'params'=>$params]
        );
    }

    public function actionAudioLecture($search = null)
    {
        $category = 'Аудио лекции';
        if ($search == null) {
            $params = 'все записи';
            $query = Post::find()->where('type = 2');
        } else {
            $params = $search;
            $query = Post::find()->where('type = 2')->andWhere(['like','title',$search]);
        }
        $pagesPosts = $this->PagesPosts($query);
        return $this->render('category',['posts'=>$pagesPosts[1],
                'pages'=>$pagesPosts[0],
                'category'=>$category,
                'params'=>$params]
        );
    }

    public function actionSearch($search)
    {
        $category = 'Все типы лекций.';
            $params = $search;
            $query = Post::find()->andWhere(['like','title',$search]);
            $pagesPosts = $this->PagesPosts($query);
        return $this->render('category',['posts'=>$pagesPosts[1],
            'pages'=>$pagesPosts[0],
            'category'=>$category,
            'params'=>$params]
        );
    }

    /**
     * @param $query
     * @return array
     */
    public function PagesPosts($query){
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 9]);
        $posts = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()
            ->with('tags')
            ->orderBy(['id_post' => SORT_DESC])
            ->all();
        return [$pages,$posts];
    }

    public function actionTags($search){
        $category = 'Теги.';
        $params = $search;
        $tags = Tag::find()->where(['like','name',$search])->asArray()->all();
        $idTag = ArrayHelper::map($tags,'id_tag','id_tag');
        $idPost = ArrayHelper::map(TagPost::find()->asArray()->where(['in','id_tag',$idTag])->groupBy('id_post')->all(),'id','id_post');
        $query = Post::find()->andWhere(['in','id_post',$idPost]);
        $pagesPosts = $this->PagesPosts($query);
        return $this->render('category',['posts'=>$pagesPosts[1],
                'pages'=>$pagesPosts[0],
                'category'=>$category,
                'params'=>$params]
        );
    }

}