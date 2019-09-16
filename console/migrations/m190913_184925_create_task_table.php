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
            'tracker' => $this->string(20)->notNull(),
            'status_id' => $this->integer()->notNull(),
            'topic' => $this->string()->notNull(),
            'id_project' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'performer_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'priority_id' => $this->integer()->notNull(),
            'description' => $this->text()->notNull(),
            'readiness' => $this->integer()->notNull(),
            'resolution_id' => $this->integer(),
            'version' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'FK_project_project_id',
            'task',
            'id_project',
            'project',
            'id',
            'RESTRICT',
            'CASCADE');

        $this->addForeignKey(
            'FK_usertask_performer_id',
            'task',
            'performer_id',
            'user',
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
