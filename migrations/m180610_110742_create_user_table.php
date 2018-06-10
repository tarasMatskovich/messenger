<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180610_110742_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string(255),
            'password' => $this->string(255),
            'auth_key' => $this->string(255)->defaultValue(NULL)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
