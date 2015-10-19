<?php
/**
 * @author xialei<home.xialei@gmail.com>
 * Date: 2015/10/19 0019
 * Time: 16:06
 */

namespace app\models;


use yii\data\ActiveDataProvider;

class UserSearch extends User
{
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username'], 'safe']
        ];
    }


    public function search($params) {
        $query = self::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username]);


        return $dataProvider;
    }

}