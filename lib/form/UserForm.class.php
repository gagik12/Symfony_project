<?php

class UserForm extends BaseUserForm
{
    private const DEFAULT_ROLE = UserRole::USER;

    public function populateUser()
    {
        $userRole = $this->getValue(UserForm::ROLE);
        $userPassword = PasswordEncoder::getEncodedPassword($this->getValue(UserForm::PASSWORD));

        $user = new User();
        $user->setLogin($this->getValue(UserForm::LOGIN));
        $user->setPassword($userPassword);
        $user->setFirstName($this->getValue(UserForm::FIRST_NAME));
        $user->setLastName($this->getValue(UserForm::LAST_NAME));
        $user->setRole(($userRole) ? $userRole : UserForm::DEFAULT_ROLE);

        return $user;
    }
}
