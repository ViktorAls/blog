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
            case Url::to(['posts/lecture']):
                $action = ['action' => Url::current(),'message'=>'Поиск по всем лекциям'];
                break;
            case Url::to(['posts/tags']):
                $action = ['action' => Url::current(),'message'=>'Поиск по тегам'];
                break;
            case Url::to(['document/index']):
                $action = ['action' => Url::current(),'message'=>'Поиск по документам'];
                break;
            case Url::to(['test/index']):
                $action = ['action' => Url::current(),'message'=>'Поиск по тестам'];
                break;
            default:
                $action = ['action' => Url::to(['posts/lecture']),'message'=>'Поиск по всем лекций'];
        }
        return $action;
    }

}