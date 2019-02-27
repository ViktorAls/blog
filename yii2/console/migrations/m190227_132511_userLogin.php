<?php

use yii\db\Migration;

/**
 * Class m190227_132511_userLogin
 */
class m190227_132511_userLogin extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\db\Exception
     * @throws \yii\base\Exception
     * Email для авторизации admin@admin.ru, пароль admin123456. При установке необходимо сменить пароль и почту в админ-панели
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand()->batchInsert('group', ['name'],
            [
                ['admin'],
            ]
        )->execute();
        Yii::$app->db->createCommand()->batchInsert('user',
            ['name','middlename','patronymic','id_group','icon','password_hash','email','status','success'],
            [
                ['Админ','Админинский','Админович',1,'avatar.jpg',
                    yii::$app->security->generatePasswordHash('admin123456'),
                    'admin@admin.ru','10','1'
                ],
            ]
        )->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190227_132511_userLogin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190227_132511_userLogin cannot be reverted.\n";

        return false;
    }
    */
}
