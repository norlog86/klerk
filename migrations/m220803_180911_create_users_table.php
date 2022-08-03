<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m220803_180911_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /**
         * Создание таблицы users
         */
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'login' => $this->string(15)->notNull()->unique(),
            'avatar' => $this->string()->null(),
            'email' => $this->string(50)->notNull()->unique(),
            'phone' => $this->integer()->notNull()->unique(),
            'website' => $this->string(50)->null(),
        ]);

        /**
         * Создание индекса для поля id
         */
        $this->createIndex(
            'idx-users-id',
            'users',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
