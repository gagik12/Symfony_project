<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 20.12.2017
 * Time: 14:10
 */

class UserData
{
    private $login;
    private $password;
    private $firstName;
    private $lastName;

    public function __construct($values)
    {
        $this->login = isset($values[UserForm::LOGIN]) ? $values[UserForm::LOGIN] : null;
        $this->password = isset($values[UserForm::PASSWORD]) ? $values[UserForm::PASSWORD] : null;
        $this->firstName = isset($values[UserForm::FIRST_NAME]) ? $values[UserForm::FIRST_NAME] : null;
        $this->lastName = isset($values[UserForm::LAST_NAME]) ? $values[UserForm::LAST_NAME] : null;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }
}