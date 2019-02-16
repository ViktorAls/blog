<?php
namespace frontend\models;

use common\models\UserFrontend;
use yii\base\Model;

/**
 * Class SignupForm
 * @package frontend\models
 */
class SignupForm extends Model
{
    public $email;
    public $password;
    public $name;
    public $middlename;
    public $patronymic;
    public $group;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\UserFrontend', 'message' => 'Этот адрес электронной почты уже занят.'],

            [['name','patronymic','middlename','group'],'required'],
            ['middlename','string','max'=>255],
            ['patronymic','string','max'=>255],
            ['name','string','max'=>255],
            ['group','integer'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * @return UserFrontend
     * @throws \yii\base\Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new UserFrontend();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->id_group = $this->group;
        $user->name = $this->name;
        $user->patronymic = $this->patronymic;
        $user->middlename = $this->middlename;
        $user->generateAuthKey();
        return !$user->save() ? null : $user;
    }
}
