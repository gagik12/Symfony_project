<?php

class logOutAction extends sfAction
{
    public function execute($request)
    {
        $this->getUser()->logOut();
        $this->redirect('@login');
        return sfView::NONE;
    }
}