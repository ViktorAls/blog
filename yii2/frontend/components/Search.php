<?php

namespace frontend\components;

use yii\helpers\Url;

class Search extends \yii\base\Component
{
    /**
     * @param $route
     * @return array
     */
    public function SearchAction($route){
        switch ($route) {
            case 'posts/photo-lecture':
                $action = ['action' => Url::to(['posts/photo-lecture']),'message'=>'Поиск по всем фото-лекциям'];
                break;
            case 'posts/lecture':
                $action = ['action' => Url::to(['posts/lecture']),'message'=>'Поиск по всем текст-лекциям'];
                break;
            case 'posts/audio-lecture':
                $action = ['action' => Url::to(['posts/audio-lecture']),'message'=>'Поиск по всем аудио-лекциям'];
                break;
            default:
                $action = ['action' => Url::to(['posts/search']),'message'=>'Поиск по всем типам лекций'];
        }
        return $action;
    }

}