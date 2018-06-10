<?php

use yii\db\Migration;

/**
 * Handles adding first_name to table `user`.
 */
class m180610_212112_add_first_name_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'first_name', $this->string());
        $this->addColumn('user', 'second_name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'first_name');
        $this->dropColumn('user', 'second_name');
    }
}
