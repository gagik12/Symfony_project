<?php

class secureAction extends sfAction
{
    public function execute($request)
    {
        if(!$this->getUser()->isUserAdmin())
        {
            $this->redirect('@user_profile');
        }
    }
}