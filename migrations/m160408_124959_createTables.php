<?php

use yii\db\Migration;

class m160408_124959_createTables extends Migration
{
    public function up()
    {

        /*
        $this->createTable('comments', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT,
        ]);

        $this->createTable('tasks', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT,
        ]);

        */


    }

    public function down()
    {

        /*
        $this->dropTable('news');
        $this->dropTable('news');
        */
        return false;
    }


}
