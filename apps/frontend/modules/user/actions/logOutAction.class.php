<?php

class logOutAction extends sfAction
{
    public function execute($request)
    {
        $this->getUser()->logOut();
        $this->redirect('@log_in');
        return sfView::NONE;
    }
}