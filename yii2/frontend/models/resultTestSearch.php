<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\resultTest;

/**
 * resultTestSearch represents the model behind the search form of `common\models\resultTest`.
 */
class resultTestSearch extends resultTest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_test', 'id_user'], 'integer'],
            [['date'], 'safe'],
            [['result'], 'number'],
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
        $query = resultTest::find()->where(['id_user'=>Yii::$app->user->id])->orderBy(['date'=>SORT_DESC])->joinWith('test');

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
            'id_test' => $this->id_test,
            'id_user' => $this->id_user,
            'date' => $this->date,
            'result' => $this->result,
        ]);

        return $dataProvider;
    }
}
