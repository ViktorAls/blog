<?php

use yii\db\Migration;

/**
 * Class m190216_095215_create_table
 */
class m190216_095215_create_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('information', [
            'id' => $this->primaryKey(),
            'name'=>$this->char(100)->notNull()->unique(),
            'value'=>$this->text()->notNull(),
            'comment'=>$this->text()->null()
        ]);
        $this->createTable('lesson', [
            'id' => $this->primaryKey(),
            'name'=>$this->char(100)->notNull()
        ]);
        $this->createTable('comment', [
                'id'=>$this->primaryKey(),
                'id_post'=>$this->integer()->notNull(),
                'id_parent'=>$this->integer()->null(),
                'text'=>$this->text()->notNull(),
                'created_at'=>$this->dateTime()->null(),
                'id_user'=>$this->integer()->notNull(),
            ]);
        $this->createTable('document', [
            'id' => $this->primaryKey(),
            'name'=>$this->text()->notNull(),
            'href'=>$this->text()->notNull(),
            'description'=>$this->text()->notNull(),
            'updated_at'=>$this->integer()->notNull(),
            'created_at'=>$this->integer()->notNull(),
            'id_lesson'=>$this->integer()->notNull(),
        ]);
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->char(150)->notNull(),
            'description' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'type' => $this->integer()->notNull(),
            'icon' => $this->text()->notNull(),
            'id_lesson'=> $this->integer()->notNull(),
        ]);
        $this->createTable('group', [
            'id' => $this->primaryKey(),
            'name'=>$this->char(100)->notNull()
        ]);
        $this->createTable('postFile', [
            'id' => $this->primaryKey(),
            'name'=>$this->text()->notNull(),
            'id_post'=>$this->integer()->notNull(),
        ]);
        $this->createTable('tagDocument', [
            'id_document' => $this->integer(),
            'id_tag' => $this->integer(),
            'PRIMARY KEY(id_document, id_tag)',
        ]);
        $this->createTable('tagPost', [
            'id_post' => $this->integer(),
            'id_tag' => $this->integer(),
            'PRIMARY KEY(id_post, id_tag)',
        ]);
        $this->createTable('tag',[
            'id'=>$this->primaryKey(),
            'name'=>$this->char(50)->notNull()
        ]);
        $this->createIndex(
            'idx-document-id_lesson',
            'document',
            'id_lesson'
        );
        $this->createIndex(
            'idx-post-id_lesson',
            'post',
            'id_lesson'
        );
        $this->createIndex(
            'idx-tagPost-id_post',
            'tagPost',
            'id_post'
        );
        $this->createIndex(
            'idx-postFile-id_post',
            'postFile',
            'id_post'
        );
        $this->createIndex(
            'idx-tagPost-id_tag',
            'tagPost',
            'id_tag'
        );
        $this->createIndex(
            'idx-tagDocument-id_document',
            'tagDocument',
            'id_document'
        );
        $this->createIndex(
            'idx-tagDocument-id_tag',
            'tagDocument',
            'id_tag'
        );
        $this->addForeignKey(
            'fk-document-id_lesson',
            'document',
            'id_lesson',
            'lesson',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-post-id_lesson',
            'post',
            'id_lesson',
            'lesson',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-postFile-id_post',
            'postFile',
            'id_post',
            'post',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-tagPost-id_post',
            'tagPost',
            'id_post',
            'post',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-tagPost-id_tag',
            'tagPost',
            'id_tag',
            'tag',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-tagDocument-id_document',
            'tagDocument',
            'id_document',
            'document',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-tagDocument-id_tag',
            'tagDocument',
            'id_tag',
            'tag',
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
            'idx-tagDocument-id_lesson',
            'post'
        );
        $this->dropIndex(
            'idx-postFile-id_post',
            'postFile'
        );
        $this->dropIndex(
            'idx-document-id_lesson',
            'document'
        );
        $this->dropIndex(
            'idx-tagDocument-id_document',
            'tagDocument'
        );
        $this->dropIndex(
            'idx-tagPost-id_post',
            'tagPost'
        );
        $this->dropIndex(
            'idx-tagPost-id_tag',
            'tagPost'
        );
        $this->dropIndex(
            'idx-tagDocument-id_tag',
            'tagDocument'
        );
        $this->dropForeignKey(
            'fk-postFile-id_post',
            'postFile'
        );
        $this->dropForeignKey(
            'fk-post-id_lesson',
            'post'
        );
        $this->dropForeignKey(
            'fk-document-id_lesson',
            'document'
        );
        $this->dropForeignKey(
            'fk-tagPost-id_tag',
            'tagPost'
        );
        $this->dropForeignKey(
            'fk-tagPost-id_post',
            'tagPost'
        );
        $this->dropForeignKey(
            'fk-tagDocument-id_document',
            'tagDocument'
        );
        $this->dropForeignKey(
            'fk-tagDocument-id_tag',
            'tagDocument'
        );
        $this->dropTable('postFile');
        $this->dropTable('post');
        $this->dropTable('information');
        $this->dropTable('group');
        $this->dropTable('lesson');
        $this->dropTable('comment');
        $this->dropTable('document');
        $this->dropTable('tagPost');
        $this->dropTable('tagDocument');
    }

}
