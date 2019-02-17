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
            'name' => $this->char(100)->notNull()->unique(),
            'value' => $this->text()->notNull(),
            'comment' => $this->text()->null()
        ]);
        $this->createTable('lesson', [
            'id' => $this->primaryKey(),
            'name' => $this->char(100)->notNull()
        ]);
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'id_post' => $this->integer()->notNull(),
            'id_parent' => $this->integer()->null(),
            'text' => $this->text()->notNull(),
            'created_at' => $this->dateTime()->null(),
            'id_user' => $this->integer()->notNull(),
        ]);
        $this->createTable('document', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'href' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'id_lesson' => $this->integer()->notNull(),
        ]);
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'title' => $this->char(150)->notNull(),
            'description' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'type' => $this->integer()->notNull(),
            'icon' => $this->text()->notNull(),
            'id_lesson' => $this->integer()->notNull(),
        ]);
        $this->createTable('group', [
            'id' => $this->primaryKey(),
            'name' => $this->char(100)->notNull()
        ]);
        $this->createTable('postFile', [
            'id' => $this->primaryKey(),
            'name' => $this->text()->notNull(),
            'id_post' => $this->integer()->notNull(),
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
        $this->createTable('tag', [
            'id' => $this->primaryKey(),
            'name' => $this->char(50)->notNull()
        ]);
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => $this->char(255)->notNull(),
            'middlename' => $this->char(255)->notNull(),
            'patronymic' => $this->char(255)->notNull(),
            'success'=>$this->smallInteger(2)->notNull()->defaultValue(0),
            'id_group' => $this->integer(11)->notNull(),
            'icon' => $this->text()->notNull()->defaultValue('default.jpg'),
            'auth_key' => $this->char(32)->notNull(),
            'password_hash' => $this->char(255)->notNull(),
            'password_reset_token' => $this->char(255)->null()->unique(),
            'email' => $this->char(255)->notNull()->unique(),
            'status' => $this->smallInteger(6)->defaultValue(0),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
        ]);
        // таблица  userFrontend, поле id_group
        $this->createIndex(
            'idx-user-id_group',
            'userFrontend',
            'id_group'
        );

        // таблица  document, поле id_lesson
        $this->createIndex(
            'idx-document-id_lesson',
            'document',
            'id_lesson'
        );
        // таблица  post, поле id_lesson
        $this->createIndex(
            'idx-post-id_lesson',
            'post',
            'id_lesson'
        );
        // таблица  tagPost, поле id_post
        $this->createIndex(
            'idx-tagPost-id_post',
            'tagPost',
            'id_post'
        );
        // таблица  postFile, поле id_post
        $this->createIndex(
            'idx-postFile-id_post',
            'postFile',
            'id_post'
        );
        // таблица  tagPost, поле id_tag
        $this->createIndex(
            'idx-tagPost-id_tag',
            'tagPost',
            'id_tag'
        );
        // таблица  tagDocument, поле id_document
        $this->createIndex(
            'idx-tagDocument-id_document',
            'tagDocument',
            'id_document'
        );
        // таблица  tagDocument, поле id_tag
        $this->createIndex(
            'idx-tagDocument-id_tag',
            'tagDocument',
            'id_tag'
        );

        // связь табилци userFrontend по полю id_group к табилци group полю id
        $this->addForeignKey(
            'fk-user-id_group',
            'userFrontend',
            'id_group',
            'group',
            'id',
            'CASCADE'
        );
        // связь табилци document по полю id_lesson к табилци lesson полю id
        $this->addForeignKey(
            'fk-document-id_lesson',
            'document',
            'id_lesson',
            'lesson',
            'id',
            'CASCADE'
        );
        // связь табилци post по полю id_lesson к табилци lesson полю id
        $this->addForeignKey(
            'fk-post-id_lesson',
            'post',
            'id_lesson',
            'lesson',
            'id',
            'CASCADE'
        );
        // связь табилци postFile по полю id_post к табилци post полю id
        $this->addForeignKey(
            'fk-postFile-id_post',
            'postFile',
            'id_post',
            'post',
            'id',
            'CASCADE'
        );
        // связь табилци tagPost по полю id_post к табилци post полю id
        $this->addForeignKey(
            'fk-tagPost-id_post',
            'tagPost',
            'id_post',
            'post',
            'id',
            'CASCADE'
        );
        // связь табилци tagPost по полю id_tag к табилци tag полю id
        $this->addForeignKey(
            'fk-tagPost-id_tag',
            'tagPost',
            'id_tag',
            'tag',
            'id',
            'CASCADE'
        );
        // связь табилци tagDocument по полю id_document к табилци document полю id
        $this->addForeignKey(
            'fk-tagDocument-id_document',
            'tagDocument',
            'id_document',
            'document',
            'id',
            'CASCADE'
        );
        // связь табилци tagDocument по полю id_tag к табилци tag полю id
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
        //внешний ключ для таблици userFrontend  поле id_group
        $this->dropForeignKey(
            'fk-user-id_group',
            'userFrontend'
        );
        //внешний ключ для таблици postFile  поле id_post
        $this->dropForeignKey(
            'fk-postFile-id_post',
            'postFile'
        );
        //внешний ключ для таблици post поле id_lesson
        $this->dropForeignKey(
            'fk-post-id_lesson',
            'post'
        );
        //внешний ключ для таблици document поле id_lesson
        $this->dropForeignKey(
            'fk-document-id_lesson',
            'document'
        );
        //внешний ключ для таблици tagPost поле id_tag
        $this->dropForeignKey(
            'fk-tagPost-id_tag',
            'tagPost'
        );
        //внешний ключ для таблици tagPost поле id_post
        $this->dropForeignKey(
            'fk-tagPost-id_post',
            'tagPost'
        );
        //внешний ключ для таблици tagDocument поле id_document
        $this->dropForeignKey(
            'fk-tagDocument-id_document',
            'tagDocument'
        );
        //внешний ключ для таблици tagDocument поле id_tag
        $this->dropForeignKey(
            'fk-tagDocument-id_tag',
            'tagDocument'
        );

        //индекс таблици userFrontend поля id_group
        $this->dropIndex(
            'idx-user-id_group',
            'userFrontend'
        );
        //индекс таблици document поля id_lesson
        $this->dropIndex(
            'idx-document-id_lesson',
            'document'
        );
        //индекс таблици post поля id_lesson
        $this->dropIndex(
            'idx-post-id_lesson',
            'post'
        );
        //индекс таблици tagPost поля id_post
        $this->dropIndex(
            'idx-tagPost-id_post',
            'tagPost'
        );
        //индекс таблици postFile поля id_post
        $this->dropIndex(
            'idx-postFile-id_post',
            'postFile'
        );
        //индекс таблици tagPost поля id_tag
        $this->dropIndex(
            'idx-tagPost-id_tag',
            'tagPost'
        );
        //индекс таблици tagDocument поля id_document
        $this->dropIndex(
            'idx-tagDocument-id_document',
            'tagDocument'
        );
        //индекс таблици tagDocument поля id_tag
        $this->dropIndex(
            'idx-tagDocument-id_tag',
            'tagDocument'
        );

        $this->dropTable('tag');
        $this->dropTable('post');
        $this->dropTable('group');
        $this->dropTable('lesson');
        $this->dropTable('comment');
        $this->dropTable('tagPost');
        $this->dropTable('postFile');
        $this->dropTable('document');
        $this->dropTable('information');
        $this->dropTable('tagDocument');
    }

}
