<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

/**
 * ContactForm is the model behind the contact form.
 */
class RegisterForm extends Model
{
    public $name;
    public $surname;
    public $patronymic;
    public $email;
    public $login;
    public $password;
    public $password_repeat;
    public $rules;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'surname', 'email', 'login', 'password', 'password_repeat'], 'required'],
			['rules', 'required', 'requiredValue' => 1],
            [['name', 'surname', 'email', 'login', 'password', 'password_repeat'], 'string', 'max' => 255],
            [['name', 'surname', 'patronymic'], 'match',
            'pattern' => '/^[а-яА-ЯёЁ\s\-]+$/u',
            'message' => 'Разрешенные символы - кириллица, пробел и тире.'],
            ['login', 'match',
            'pattern' => '/^[a-zA-Z0-9\-]+$/u',
            'message' => 'Разрешенные символы - латиница, цифры и тире.'],
            ['email', 'email'],
            [['login', 'email'], 'unique', 'targetClass' => User::class],
            [['password', 'password_repeat'], 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return User whether the model passes validation
     */
    public function registerUser()
    {
        if ($this->validate()) {
            $user = new User();
            if ( $user->load($this->attributes, '') ) {

                if ( $user->save(false) ) {
                    //VarDumper::dump($user->errors);
                    //die;
                }

            }
        } else {
            //VarDumper::dump($this->errors);
            //die;
        }

        return !empty($user) ? $user : false;
    }
}
