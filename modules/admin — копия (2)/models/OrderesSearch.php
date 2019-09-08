<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Orderes;

/**
 * OrderesSearch represents the model behind the search form of `app\modules\admin\models\Orderes`.
 */
class OrderesSearch extends Orderes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'id_user'], 'integer'],
            [['creates_at', 'updated_at', 'address', 'pay', 'card'], 'safe'],
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
        $query = Orderes::find();

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
            'creates_at' => $this->creates_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'pay', $this->pay])
            ->andFilterWhere(['like', 'card', $this->card]);

        return $dataProvider;
    }
}
