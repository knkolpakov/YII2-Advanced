<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Task;

/**
 * TaskSearch represents the model behind the search form of `backend\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status_id', 'id_project', 'author_id', 'performer_id', 'created_at', 'updated_at', 'category_id', 'priority_id', 'readiness', 'resolution_id', 'version'], 'integer'],
            [['tracker', 'topic', 'description'], 'safe'],
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
            'status_id' => $this->status_id,
            'id_project' => $this->id_project,
            'author_id' => $this->author_id,
            'performer_id' => $this->performer_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'category_id' => $this->category_id,
            'priority_id' => $this->priority_id,
            'readiness' => $this->readiness,
            'resolution_id' => $this->resolution_id,
            'version' => $this->version,
        ]);

        $query->andFilterWhere(['like', 'tracker', $this->tracker])
            ->andFilterWhere(['like', 'topic', $this->topic])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
