<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;

/**
 * BookSearch represents the model behind the search form of `app\models\Book`.
 */
class BookSearch extends Book
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'old_price', 'new', 'sale','release_date'], 'integer'],
            [['tag', 'price', 'description', 'imagines','release_date'], 'safe'],
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
    public function searchGenre($params,$getGenres=null)
    {
        $query = Book::find()->joinWith('bookgenre')->where(['id_genre'=>$getGenres]);

        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
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
            'old_price' => $this->old_price,
            'new' => $this->new,
            'sale' => $this->sale,
        ]);

        $query->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'release_date', $this->release_date])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'imagines', $this->imagines]);

        return $dataProvider;
    }
    public function search($params,$getGenres=null)
    {
        if($getGenres!=null){
            $query = Book::find()->joinWith('bookgenre')->where(['id_genre'=>$getGenres]);
        }else{
        $query = Book::find();
        }
        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
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
            'old_price' => $this->old_price,
            'new' => $this->new,
            'sale' => $this->sale,
        ]);

        $query->andFilterWhere(['like', 'tag', $this->tag])
            ->andFilterWhere(['like', 'release_date', $this->release_date])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'imagines', $this->imagines]);

        return $dataProvider;
    }
}
