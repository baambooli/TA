<?php

class UserIdentity extends CUserIdentity {

    private $id;

    public function authenticate() {
        $record = User::model()->findByAttributes(array('username' => $this->username));
        if ($record === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if ($record->password !== sha1($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->id = $record->id;
            $this->setState('roles', $record->roles);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId() {
        return $this->id;
    }

}