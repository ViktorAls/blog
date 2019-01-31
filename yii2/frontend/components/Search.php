<?php

namespace frontend\components;

use yii\helpers\Url;

class Search extends \yii\base\Component
{
    /**
     * @param string $route
     * @return array
     */
    public function SearchAction($route){
        switch ($route) {
            case 'posts/photo-lecture':
                $action = ['action' =>Url::current(),'message'=>'Поиск по всем фото-лекциям'];
                break;
            case 'posts/lecture':
                $action = ['action' => Url::current(),'message'=>'Поиск по всем текст-лекциям'];
                break;
            case 'posts/audio-lecture':
                $action = ['action' => Url::current(),'message'=>'Поиск по всем аудио-лекциям'];
                break;
            case 'posts/tags':
                $action = ['action' => Url::current(),'message'=>'Поиск по тегам'];
                break;
            case 'document/index':
                $action = ['action' => Url::current(),'message'=>'Поиск по документам'];
                break;
            default:
                $action = ['action' => Url::to(['posts/search']),'message'=>'Поиск по всем типам лекций'];
        }
        return $action;
    }

}