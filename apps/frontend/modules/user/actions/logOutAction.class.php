<?php

class logOutAction extends sfAction
{
    public function execute($request)
    {
        $user = $this->getUser();
        $user->logOut();
        $this->redirect('@log_in');
        return sfView::NONE;
    }
}