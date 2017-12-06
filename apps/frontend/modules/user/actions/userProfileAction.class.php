<?php

/**
 * @property string $userFirstName
 * @property string $userLastName
 */
class userProfileAction extends sfAction
{
    public function execute($request)
    {
        $this->userFirstName = $this->getUser()->getLoggedUser()->getFirstName();
        $this->userLastName = $this->getUser()->getLoggedUser()->getLastName();
    }
}