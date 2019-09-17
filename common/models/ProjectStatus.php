<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project_status".
 *
 * @property int $id
 * @property string $project_status_name
 */
class ProjectStatus extends \yii\db\ActiveRecord
{
    const IN_PROGRESS_ID = 1;
    const ON_PLANNING_ID = 2;
    const FINISHED_ID = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_status_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_status_name' => 'Project Status Name',
        ];
    }

    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['id_project_status' => 'id']);
    }

    public static function getProjectStatusName()
    {
        return [
            self::IN_PROGRESS_ID => 'В работе',
            self::ON_PLANNING_ID => 'Планируется',
            self::FINISHED_ID => 'Завершено',
        ];
    }
}
