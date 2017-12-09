<?php

class secureAction extends sfAction
{
    public function execute($request)
    {
        if(!$this->getUser()->isAdmin())
        {
            $this->redirect('@user_profile');
        }
    }
}