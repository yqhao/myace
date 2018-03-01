<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Dsn;

/**
 * DsnlSearch represents the model behind the search form of `common\models\Dsn`.
 */
class DsnlSearch extends Dsn
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'merchant_id'], 'integer'],
            [['host', 'port', 'dbname', 'username', 'password', 'salt'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Dsn::find();

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
            'merchant_id' => $this->merchant_id,
        ]);

        $query->andFilterWhere(['like', 'host', $this->host])
            ->andFilterWhere(['like', 'port', $this->port])
            ->andFilterWhere(['like', 'dbname', $this->dbname])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'salt', $this->salt]);

        return $dataProvider;
    }
}
