<?php

use yii\db\Migration;

/**
 * Handles the creation of table `rooms`.
 */
class m180615_162430_create_rooms_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('rooms', [
            'id' => $this->primaryKey(),
            'sender_id' => $this->integer(),
            'recipient_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('rooms');
    }
}
