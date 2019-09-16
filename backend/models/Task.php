<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $tracker
 * @property int $status_id
 * @property string $topic
 * @property int $id_project
 * @property int $author_id
 * @property int $performer_id
 * @property int $created_at
 * @property int $updated_at
 * @property int $category_id
 * @property int $priority_id
 * @property string $description
 * @property int $readiness
 * @property int $resolution_id
 * @property int $version
 *
 * @property Project $project
 * @property User $author
 * @property User $performer
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tracker', 'status_id', 'topic', 'id_project', 'author_id', 'performer_id', 'created_at', 'updated_at', 'category_id', 'priority_id', 'description', 'readiness', 'resolution_id', 'version'], 'required'],
            [['status_id', 'id_project', 'author_id', 'performer_id', 'created_at', 'updated_at', 'category_id', 'priority_id', 'readiness', 'resolution_id', 'version'], 'integer'],
            [['description'], 'string'],
            [['tracker'], 'string', 'max' => 20],
            [['topic'], 'string', 'max' => 255],
            [['id_project'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['id_project' => 'id']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['performer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['performer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tracker' => 'Tracker',
            'status_id' => 'Status ID',
            'topic' => 'Topic',
            'id_project' => 'Id Project',
            'author_id' => 'Author ID',
            'performer_id' => 'Performer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'category_id' => 'Category ID',
            'priority_id' => 'Priority ID',
            'description' => 'Description',
            'readiness' => 'Readiness',
            'resolution_id' => 'Resolution ID',
            'version' => 'Version',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'id_project']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerformer()
    {
        return $this->hasOne(User::className(), ['id' => 'performer_id']);
    }
}
