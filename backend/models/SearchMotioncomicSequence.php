<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MotioncomicSequence;

/**
 * SearchMotioncomicSequence represents the model behind the search form about `backend\models\MotioncomicSequence`.
 */
class SearchMotioncomicSequence extends MotioncomicSequence
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'qrcode_id', 'sequence'], 'integer'],
            [['filename', 'width', 'height', 'options'], 'safe'],
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
        $query = MotioncomicSequence::find();

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
            'qrcode_id' => $this->qrcode_id,
            'sequence' => $this->sequence,
        ]);

        $query->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'width', $this->width])
            ->andFilterWhere(['like', 'height', $this->height])
            ->andFilterWhere(['like', 'options', $this->options]);

        return $dataProvider;
    }
}
