<?php
/**
 * @author xialei<home.xialei@gmail.com>
 * Date: 2015/10/19 0019
 * Time: 15:16
 */

namespace app\forms;


use app\models\User;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $verifyCode;

    public function rules()
    {
        return [
            [['username', 'password', 'verifyCode'], 'required'],
            ['verifyCode', 'captcha']
        ];
    }


    public function attributeLabels()
    {
        return [
            'username' => '账号',
            'password' => '密码',
            'verifyCode' => '验证码'
        ];
    }

    /**
     * 登录
     * @return bool
     */
    public function login()
    {
        $user = User::findByAccount($this->username, $this->password);
        if (empty($user)) {
            $this->addError('password', '账号或密码错误!');
            return false;
        }
        \Yii::$app->user->login($user, 7 * 24 * 3600);
        return true;
    }
}