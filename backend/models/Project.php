<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $project_name
 * @property int $id_user
 * @property int $id_project_status
 *
 * @property Project $projectStatus
 * @property Project[] $projects
 * @property User $user
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['project_name', 'id_user', 'id_project_status'], 'required'],
            [['id_user', 'id_project_status'], 'integer'],
            [['project_name'], 'string', 'max' => 50],
            [['id_project_status'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['id_project_status' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_name' => 'Project Name',
            'id_user' => 'Id User',
            'id_project_status' => 'Id Project Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectStatus()
    {
        return $this->hasOne(Project::className(), ['id' => 'id_project_status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['id_project_status' => 'id']);
    }

    public function getTask()
    {
        return $this->hasMany(Task::className(), ['id_task' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
