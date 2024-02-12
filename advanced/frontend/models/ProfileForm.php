<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Profile form
 */
class ProfileForm extends Model
{
    public $first_name;
    public $last_name;
    public $email;
    public $password; 
    public $passwordRepeat;

    private $_user;


    public static function GetWithUser($userId){

        if ($userId == null)
            return null;


        $pf = new ProfileForm();

        $user = $pf->getUser($userId);
        $pf->first_name = $user->first_name;
        $pf->last_name = $user->last_name;
        $pf->email = $user->email;

        return $pf;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['first_name', 'trim'],
            ['first_name', 'required'],
            ['first_name', 'string', 'min' => 2, 'max' => 255],

            ['last_name', 'trim'],
            ['last_name', 'required'],
            ['last_name', 'string', 'min' => 2, 'max' => 255],

            //['email', 'readonly'],

            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],

            ['passwordRepeat', 'checkPasswords']
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */

    public function checkPasswords($attribute, $params){
        if ($this->password != $this->passwordRepeat)
            $this->addError($attribute, 'Пароли не совпадают');
            return null;
    }

    public function getUser($userId){
        if ($this->_user === null) {
            $this->_user = User::findOne($userId);
        }

        return $this->_user;
    }

    public function edit(){
        $user = $this->getUser(Yii::$app->user->identity->id);

        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        if($this->password != null)
            $user->setPassword($this->password);
        //$user->generateAuthKey();

        return $user->save();

    }
        


}
