<?php

/** @property array $users */
class userListAction extends sfAction
{
    public function execute($request)
    {
        $this->users = UserPeer::doSelect(new Criteria());
    }
}