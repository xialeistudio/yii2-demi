<?php
/**
 * @author xialei<home.xialei@gmail.com>
 * Date: 2015/10/19 0019
 * Time: 16:06
 */

namespace app\models;


class UserSearch extends User
{
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['username'], 'safe']
        ];
    }
}