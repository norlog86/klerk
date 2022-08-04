<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%users}}`.
 */
class m220804_072137_add_password_column_to_users_table extends Migration
{
    public function up()
    {
        $this->addColumn('users', 'password', $this->string(50)->notNull());
    }

    public function down()
    {
        $this->dropColumn('users', 'password');
    }
}
