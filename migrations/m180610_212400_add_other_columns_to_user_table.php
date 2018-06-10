<?php

use yii\db\Migration;

/**
 * Handles adding other to table `user`.
 */
class m180610_212400_add_other_columns_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'city', $this->string());
        $this->addColumn('user', 'age', $this->integer());
        $this->addColumn('user', 'phone', $this->integer());
        $this->addColumn('user', 'about', $this->text());
        $this->addColumn('user', 'img', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'city');
        $this->dropColumn('user', 'age');
        $this->dropColumn('user', 'phone');
        $this->dropColumn('user', 'about');
        $this->dropColumn('user', 'img');
    }
}
