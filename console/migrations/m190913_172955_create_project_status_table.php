<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%project_status}}`.
 */
class m190913_172955_create_project_status_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%project_status}}', [
            'id' => $this->primaryKey(),
            'project_status_name' => $this->string(50)

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%project_status}}');
    }
}
