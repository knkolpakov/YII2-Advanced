<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $tracker
 * @property string $status
 * @property string $topic
 * @property int $author_id
 * @property int $performer_id
 * @property int $created_at
 * @property int $updated_at
 * @property string $category
 * @property string $priority
 * @property string $description
 * @property int $readiness
 * @property string $resolution
 *
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
            [['tracker', 'status', 'topic', 'author_id', 'performer_id', 'created_at', 'updated_at', 'category', 'priority', 'description', 'readiness', 'resolution'], 'required'],
            [['author_id', 'performer_id', 'created_at', 'updated_at', 'readiness'], 'integer'],
            [['description', 'resolution'], 'string'],
            [['tracker'], 'string', 'max' => 20],
            [['status'], 'string', 'max' => 15],
            [['topic', 'category', 'priority'], 'string', 'max' => 255],
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
            'status' => 'Status',
            'topic' => 'Topic',
            'author_id' => 'Author ID',
            'performer_id' => 'Performer ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'category' => 'Category',
            'priority' => 'Priority',
            'description' => 'Description',
            'readiness' => 'Readiness',
            'resolution' => 'Resolution',
        ];
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
