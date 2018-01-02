<?php

class UserForm extends BaseUserForm
{
    private const DEFAULT_ROLE = UserRole::USER;

    private $user;

    public function populateUser()
    {
        $this->user = new User();
        $this->user->setLogin($this->getValue(UserForm::LOGIN));
        $this->user->setPassword($this->getValue(UserForm::PASSWORD));
        $this->user->setFirstName($this->getValue(UserForm::FIRST_NAME));
        $this->user->setLastName($this->getValue(UserForm::LAST_NAME));
        $role = $this->getValue(UserForm::ROLE);
        $this->user->setRole(($role) ? $role : UserForm::DEFAULT_ROLE);
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
