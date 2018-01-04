<?php

/**
 * @property string $userFirstName
 * @property string $userLastName
 */
class userProfileAction extends sfAction
{
    public function execute($request)
    {
        $loggedUser = $this->getUser()->getLoggedUser();
        $this->userFirstName = $loggedUser->getFirstName();
        $this->userLastName = $loggedUser->getLastName();
    }
}