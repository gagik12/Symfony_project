<?php

class myUser extends sfBasicSecurityUser
{
    public function logOut()
    {
        if ($this->isAuthenticated())
        {
            $this->setAuthenticated(false);
            $this->clearCredentials();
        }
    }
}
