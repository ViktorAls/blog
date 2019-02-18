<?php

use yii\db\Migration;

/**
 * Handles the creation of table `resulteTest`.
 */
class m190218_171852_create_resultTest_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('resultTest', [
            'id' => $this->primaryKey(),
            'id_test'=>$this->integer()->notNull(),
            'id_user'=>$this->integer()->notNull(),
            'date'=>$this->dateTime()->notNull(),
            'resulte'=>$this->double(2)->notNull(),
        ]);
        $this->createIndex(
            'idx-resultTest-id_test',
            'question',
            'id_test'
        );
        $this->createIndex(
            'idx-resultTest-id_question',
            'user',
            'id_user'
        );

        $this->addForeignKey(
            'fk-resultTest-id_user',
            'resultTest',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-resultTest-id_test',
            'resultTest',
            'id_test',
            'test',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('resultTest');

        $this->dropIndex(
            'idx-resultTest-id_test',
            'question'
        );
        $this->dropIndex(
            'idx-resultTest-id_question',
            'user'
        );

        $this->dropForeignKey(
            'fk-resultTest-id_user',
            'resultTest'
        );
        $this->dropForeignKey(
            'fk-resultTest-id_test',
            'resultTest'
        );
    }
}
