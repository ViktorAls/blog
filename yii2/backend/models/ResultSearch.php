<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\resultTest;

/**
 * ResultSearch represents the model behind the search form of `common\models\resultTest`.
 */
class ResultSearch extends resultTest
{

    public $id_group;
    public $user;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_test', 'id_user'], 'integer'],
            [['date', 'id_group'], 'safe'],
            [['result'], 'number'],
            [['user'], 'string'],
        ];
    }


    /**
     * @param $user
     * @return array
     */
    public function searchUser($user)
    {
        if ($user !== null) {
            $arrayFIO = explode(' ', $user);
        }
        if (empty($arrayFIO[0])) {
            $arrayFIO[] = '';
        }
        if (empty($arrayFIO[1])) {
            $arrayFIO[] = '';
        }
        if (empty($arrayFIO[2])){
            $arrayFIO[] = '';
        }
        return $arrayFIO;
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

        $query = resultTest::find()->joinWith('user.group')->with('test')->asArray();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;
        }

        $user = $this->searchUser($this->user);
        $query->andFilterWhere(['>=', 'resultTest.result', $this->result]);
        $query->andFilterWhere(['like', 'user.middlename', $user[0]]);
        $query->andFilterWhere(['like', 'user.name', $user[1]]);
        $query->andFilterWhere(['like', 'user.patronymic', $user[2]]);

        $query->andFilterWhere(['=', 'group.id', $this->id_group]);
        // grid filtering conditions
        $query->andFilterWhere([
            'resultTest.id_test' => $this->id_test,
            'resultTest.id_user' => $this->id_user,
            'resultTest.date' => $this->date,
        ]);

        return $dataProvider;
    }
}
