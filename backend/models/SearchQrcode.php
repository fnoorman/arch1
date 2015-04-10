<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Qrcode;

/**
 * SearchQrcode represents the model behind the search form about `backend\models\Qrcode`.
 */
class SearchQrcode extends Qrcode
{
    public $categoryName;
    public $clienName;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'created_at', 'updated_at', 'create_by', 'start_at', 'end_by', 'updated_by', 'category_id', 'client_id'], 'integer'],
            [['code','client_id','category_id'], 'safe'],
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
        $query = Qrcode::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            // 'created_at' => $this->created_at,
            // 'updated_at' => $this->updated_at,
            // 'create_by' => $this->create_by,
            // 'start_at' => $this->start_at,
            // 'end_by' => $this->end_by,
            // 'updated_by' => $this->updated_by,
            'category_id' => $this->category_id,
            'client_id' => $this->client_id,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code]);

        return $dataProvider;
    }
}
