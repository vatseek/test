<?php

class UserIdentity extends CUserIdentity {
    // Будем хранить id.
    protected $_id;
    protected $userData;

    public function authenticate()
    {
        // Производим стандартную аутентификацию, описанную в руководстве.
        $user = User::model()->find('LOWER(login)=?', array(strtolower($this->username)));
        if(($user===null) or (md5($this->password)!==$user->password)) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else {
            $this->_id = $user->id;
            $this->setUserData($user);
            $this->username = $user->login;
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getUserData()
    {
        return $this->userData;
    }

    protected function setUserData(User $oUser)
    {
        //TODO: remove secure data
        $this->userData = $oUser;
    }
}