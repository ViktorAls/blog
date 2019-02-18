<?php

use yii\db\Migration;

/**
 * Class m190218_165329_created_test
 */
class m190218_165329_created_test extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('test', [
            'id' => $this->primaryKey(),
            'title' => $this->char(150)->notNull(),
            'description' => $this->text()->notNull(),
            'id_lesson' => $this->integer()->notNull(),
            'date' => $this->dateTime()->null(),
            'begin_date' => $this->dateTime()->null(),
            'end_date' => $this->dateTime()->null(),

        ]);
        $this->createTable('answer', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->notNull(),
            'bool' => $this->boolean()->notNull(),
            'id_question' => $this->integer()->notNull(),
        ]);
        $this->createTable('question', [
            'id' => $this->primaryKey(),
            'title' => $this->text()->notNull(),
            'icon' => $this->char(40)->notNull(),
            'id_test' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-test-id_lesson',
            'test',
            'id_lesson'
        );
        $this->createIndex(
            'idx-question-id_test',
            'question',
            'id_test'
        );
        $this->createIndex(
            'idx-answer-id_question',
            'answer',
            'id_question'
        );

        $this->addForeignKey(
            'fk-test-id_lesson',
            'test',
            'id_lesson',
            'lesson',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-question-id_test',
            'question',
            'id_test',
            'test',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-answer-id_question',
            'answer',
            'id_question',
            'question',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'idx-test-id_lesson',
            'test'
        );
        $this->dropIndex(
            'idx-answer-id_question',
            'answer'
        );
        $this->dropIndex(
            'idx-question-id_test',
            'question'
        );

        $this->dropForeignKey(
            'fk-test-id_lesson',
            'test'
        );
        $this->dropForeignKey(
            'fk-question-id_test',
            'question'
        );
        $this->dropForeignKey(
            'fk-answer-id_question',
            'answer'
        );

        $this->dropTable('test');
        $this->dropTable('question');
        $this->dropTable('answer');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190218_165329_created_test cannot be reverted.\n";

        return false;
    }
    */
}
