<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Qrinfo;

/**
 * SearchQrinfo represents the model behind the search form about `backend\models\Qrinfo`.
 */
class SearchQrinfo extends Qrinfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'artist_id', 'author_id', 'grartist_id', 'qrcode_id'], 'integer'],
            [['description'], 'safe'],
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
        $query = Qrinfo::find();

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
            'artist_id' => $this->artist_id,
            'author_id' => $this->author_id,
            'grartist_id' => $this->grartist_id,
            'qrcode_id' => $this->qrcode_id,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
