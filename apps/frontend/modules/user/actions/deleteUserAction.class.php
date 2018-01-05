<?php

class deleteUserAction extends sfAction
{
    public function execute($request)
    {
        $login = $request->getParameter("login");
        UserPeer::deleteUser($login);
        $this->redirect('@user_list');
    }
}