<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "priority".
 *
 * @property int $id
 * @property string $name
 *
 * @property Task[] $tasks
 */
class Priority extends \yii\db\ActiveRecord
{
    const LOW_ID = 1;
    const NORMAL_ID = 2;
    const HIGH_ID = 3;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'priority';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTasks()
    {
        return $this->hasMany(Task::className(), ['priority_id' => 'id']);
    }

    public static function getPriorityName()
    {
        return [
            self::LOW_ID=>'Низкий',
            self::NORMAL_ID=>'Нормальный',
            self::HIGH_ID=>'Высокий',
        ];
    }
}
