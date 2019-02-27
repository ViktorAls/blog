<?php

use yii\db\Migration;

/**
 * Class m190216_104002_insert_information_table
 */
class m190216_104002_insert_information_table extends Migration
{
    /**
     * @return bool|void
     * @throws \yii\db\Exception
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand()->batchInsert('information', ['name','value','comment'],
            [
                ['vkontakte','http://vk.com/id1','Страница ВКонтакте'],
                ['mail','mail@ru.ru','Почта для ображращения'],
                ['facebook','страница в файсбуке','страница в файсбуке'],
                ['pointOfView','Моя точка зрения','Моя точка зрения'],
                ['aboutMe','Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi','Страница О себе. Главная запись'],
                ['whoAmI','Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi','Страница О себе. Кто я'],
                ['myMission','Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi','Страница О себе. Моя миссия'],
                ['myOpinion','Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi','Страница О себе. Мой взгляд'],
                ['myValues','Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi','Страница О себе. Мой ценности'],
                ['mainFeedback','Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi','Главный текст на странице обратная связь'],
                ['address','Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi','Адрес, где можно найти'],
                ['feedback','Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit nisi','Адрес, где можно найти'],
            ]
        )->execute();
    }

    public function safeDown()
    {
       echo 'Действие отмене не подлежит';
       return false;
    }

}
