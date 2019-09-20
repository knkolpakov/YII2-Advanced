<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m190913_184925_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(20)->notNull(),
            'description' => $this->string(20)->notNull(),
            'author_id' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull(),
            'priority_id' => $this->integer()->notNull(),
            'project_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'FK_project_project_id',
            'task',
            'priority_id',
            'project',
            'id',
            'RESTRICT',
            'CASCADE');

        $this->addForeignKey(
            'FK_priority_priority_id',
            'task',
            'priority_id',
            'priority',
            'id',
            'RESTRICT',
            'CASCADE');

        $this->addForeignKey(
            'FK_status_status_id',
            'task',
            'status_id',
            'status',
            'id',
            'RESTRICT',
            'CASCADE');

        $this->addForeignKey(
            'FK_usertask_author_id',
            'task',
            'author_id',
            'user',
            'id',
            'RESTRICT',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}
