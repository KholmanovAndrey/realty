<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Realty;

/**
 * RealtySearch represents the model behind the search form of `common\models\Realty`.
 */
class RealtySearch extends Realty
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'address_id', 'price', 'photos', 'number_of_rooms', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'title', 'description', 'phones', 'contact', 'district', 'sleeping_places'], 'safe'],
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
        $query = Realty::find();

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
            'address_id' => $this->address_id,
            'price' => $this->price,
            'photos' => $this->photos,
            'number_of_rooms' => $this->number_of_rooms,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'phones', $this->phones])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'sleeping_places', $this->sleeping_places]);

        return $dataProvider;
    }
}
