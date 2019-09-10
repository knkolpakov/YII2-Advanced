<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Task;

/**
 * TaskSearch represents the model behind the search form of `frontend\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'author_id', 'performer_id', 'created_at', 'updated_at', 'readiness'], 'integer'],
            [['tracker', 'status', 'topic', 'category', 'priority', 'description', 'resolution'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Task::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'author_id' => $this->author_id,
            'performer_id' => $this->performer_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'readiness' => $this->readiness,
        ]);

        $query->andFilterWhere(['like', 'tracker', $this->tracker])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'topic', $this->topic])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'priority', $this->priority])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'resolution', $this->resolution]);

        return $dataProvider;
    }
}
