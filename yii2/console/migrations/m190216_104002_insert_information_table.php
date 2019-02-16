<?php

use yii\db\Migration;

/**
 * Class m190216_104002_insert_information_table
 */
class m190216_104002_insert_information_table extends Migration
{
    public function safeUp()
    {
        Yii::$app->db->createCommand()->batchInsert('country', ['name',''], [
            ['Австралия'],
            ['Австрия'],
            ['Азербайджан'],
            ['Албания'],
        ])->execute();

    }

    public function safeDown()
    {
        Yii::$app->db->createCommand()->delete('country', ['in', 'name', ['Австралия', 'Австрия', 'Азербайджан', 'Албания']]
        )->execute();

    }

}
