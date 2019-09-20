<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "status".
 *
 * @property int $id
 * @property string $name
 *
 * @property Task[] $tasks
 */
class Status extends \yii\db\ActiveRecord
{
    const NEW_ID = 1;
    const IN_PROGRESS_ID = 2;
    const ON_TESTING_ID = 3;
    const READY_ID = 4;
    const ARCHIVE_ID = 5;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status';
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
        return $this->hasMany(Task::className(), ['status_id' => 'id']);
    }

    public static function statusName()
    {
        return [
            self::NEW_ID => 'Новая',
            self::IN_PROGRESS_ID => 'В работе',
            self::ON_TESTING_ID => 'В тестировании',
            self::READY_ID => 'Готово',
            self::ARCHIVE_ID => 'Архивная',
        ];
    }
}
