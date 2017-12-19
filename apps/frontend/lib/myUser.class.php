<?php

class myUser extends sfBasicSecurityUser
{
    private const LOGGED_USER = 'loggedUser';

    public function logIn($userFromDatabase)
    {
        $this->setAuthenticated(true);
        $this->setAttribute(myUser::LOGGED_USER, $userFromDatabase);
        $this->addCredential($userFromDatabase->getRole());
    }

    public function logOut()
    {
        if ($this->isAuthenticated())
        {
            $this->setAuthenticated(false);
            $this->clearCredentials();
        }
    }

    public function getLoggedUser()
    {
        return ($this->hasAttribute(myUser::LOGGED_USER)) ? $this->getAttribute(myUser::LOGGED_USER) : null;
    }

    public function isAdmin()
    {
        return $this->hasCredential(UserRole::ADMIN);
    }

    public function getUserRole(): string
    {
        return $this->getLoggedUser()->getRole();
    }
}
