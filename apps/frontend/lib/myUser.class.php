<?php

class myUser extends sfBasicSecurityUser
{
    public function signIn($userFromDatabase)
    {
        $this->setAuthenticated(true);
        $this->setAttribute('userFromDatabase', $userFromDatabase);
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

    public function getUserFromDatabase()
    {
        return ($this->hasAttribute('userFromDatabase')) ? $this->getAttribute('userFromDatabase') : null;
    }
}
