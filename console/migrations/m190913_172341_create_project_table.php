<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project}}`.
 */
class m190913_172341_create_project_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'project_name' => $this->string(50)->notNull(),
            'id_user' => $this->integer()->notNull(),
            'id_project_status' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'FK_project_status_project_id',
            'project',
            'id_project_status',
            'project',
            'id',
            'RESTRICT',
            'CASCADE');

        $this->addForeignKey(
            'FK_project_user_id',
            'project',
            'id_user',
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
        $this->dropTable('{{%project}}');
    }
}
