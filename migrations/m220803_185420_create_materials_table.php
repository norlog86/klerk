<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%materials}}`.
 */
class m220803_185420_create_materials_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /**
         * Создание таблицы materials
         */
        $this->createTable('{{%materials}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'blog_id' => $this->integer()->null(),
        ]);

        /**
         * Создание индекса для поля id
         */
        $this->createIndex(
            'idx-materials-id',
            'materials',
            'id'
        );

        /**
         * Создание индекса для поля blog_id
         */
        $this->createIndex(
            'idx-materials-blog_id',
            'materials',
            'blog_id'
        );

        /**
         * Создание внешнего ключа поля blog_id
         */
        $this->addForeignKey(
            'fk-materials-blog_id',
            'materials',
            'blog_id',
            'blogs',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%materials}}');
    }
}
