<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Ordercart;

/**
 * OrdercartSearch represents the model behind the search form of `app\modules\admin\models\Ordercart`.
 */
class OrdercartSearch extends Ordercart
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'qty', 'sum', 'status', 'delivery', 'payment'], 'integer'],
            [['name', 'date', 'address', 'phone', 'comment'], 'safe'],
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
        $query = Ordercart::find()->orderBy(['status' => SORT_ASC]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
//            'sort' => [
//                'attributes' => [
//                    'id' => [
//                        'asc' => ['id' => SORT_NUMERIC],
//                        'desc' => ['id' => SORT_DESC],
//                        'default' => SORT_ASC,
//                        'label' => '#',
//                    ],
//                ],
//            ],
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
            'created_at' => $this->created_at,
            'qty' => $this->qty,
            'sum' => $this->sum,
            'status' => $this->status,
            'delivery' => $this->delivery,
            'payment' => $this->payment,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
