<?php

use yii\db\Migration;

/**
 * Handles the creation of table `messages`.
 */
class m180615_162656_create_messages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('messages', [
            'id' => $this->primaryKey(),
            'room_id' => $this->integer(),
            'text' => $this->text(),
            'sender_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('messages');
    }
}
