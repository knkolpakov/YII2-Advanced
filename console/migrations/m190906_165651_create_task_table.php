<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%task}}`.
 */
class m190906_165651_create_task_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%task}}', [
            'id' => $this->primaryKey(),
            'tracker' => $this->string(20)->notNull(),
            'status' => $this->string(15)->notNull(),
            'topic' => $this->string()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'performer_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'category' => $this->string()->notNull(),
            'priority' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'readiness' => $this->integer()->notNull(),
            'resolution' => $this->text(),
            'version' => $this->string(),
        ]);

        $this->addForeignKey(
            'FK_usertask_author_id',
            'task',
            'author_id',
            'user',
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
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%task}}');
    }
}
