<?php

class UserIdentity extends CUserIdentity
{
    private $_id;
    private $_password;

	public function authenticate()
	{
        $username=strtolower($this->username);
        $user=User::model()->find('LOWER(email)=?',array($this->username));
        if ($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if (md5(md5($this->password))!==$user->password)
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id=$user->id;
            $this->_password=$user->password;
            $this->username=$user->email;
            $this->errorCode=self::ERROR_NONE;
        }
		return !$this->errorCode;
	}

    public function getPassword()
    {
        return $this->_password;
    }

    public function getId()
    {
        return $this->_id;
    }
}
