<?php

use yii\db\Migration;


class m160411_122332_create_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        /*$this->createTable('tables', [
            'id' => $this->primaryKey(),
        ]);
        */

        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'task' => $this->string(100)->notNull(),
            'status' => $this->integer(),
            'deadline' => $this->date(),
            'count' => $this->integer(),
        ]);

        $this->createTable('comments', [
            'id' => $this->primaryKey(),
            'id_task' => $this->integer()->notNull(),
            'username' => $this->string(50),
            'comment' => $this->text(),
            'date_create' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tasks');
        $this->dropTable('comments');
    }
}
