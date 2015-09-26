<?php

use yii\db\Migration;
use yii\db\Schema;

class m141118_130838_session extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%session}}', [
            'id' => Schema::TYPE_STRING. '(40) NOT NULL',
            'expire' => Schema::TYPE_INTEGER,
            'data' => Schema::TYPE_BINARY,
        ], $tableOptions);
        $this->addPrimaryKey($this->db->tablePrefix.'session_pk', '{{%session}}', 'id');
    }

    public function safeDown()
    {
        $this->dropPrimaryKey($this->db->tablePrefix.'session_pk', '{{%session}}');
        $this->dropTable('{{%session}}');
    }
}
