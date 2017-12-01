<?php

/** @property string $userName */
class hello_worldActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        $this->userName = $this->getUser()->getUserFromDatabase()->getFirstName();
    }
}
