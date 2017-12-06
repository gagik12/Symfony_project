<?php

class defaultActions extends sfActions
{
    public function executeError404(sfWebRequest $request)
    {
        return sfView::SUCCESS;
    }

    public function executeSecure(sfWebRequest $request)
    {
        if(!$this->getUser()->isUserAdmin())
        {
            $this->redirect('@user_profile');
        }
    }
}
