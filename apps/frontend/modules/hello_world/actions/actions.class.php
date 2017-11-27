<?php

/** @property string $userName */
class hello_worldActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        if (!$this->getUser()->isAuthenticated())
        {
            $this->redirect('user/signIn');
        }
        $this->userName = $this->getUser()->getAttribute('userName');
    }
}
