<?php

/** @property array $users */
class userListAction extends sfAction
{
    private const COUNT_NEW_USERS = 10;
    private const DEFAULT_OFFSET = 0;

    public function execute($request)
    {
        if($request->isXmlHttpRequest())
        {
            $page = $request->getParameter('page');
            $offset = $page * userListAction::COUNT_NEW_USERS;
            $array = array_slice(UserPeer::doSelect(new Criteria()), $offset, userListAction::COUNT_NEW_USERS);
            return $this->renderPartial("user_list", ['users' => $array]);
        }
        else
        {
            $array = array_slice(UserPeer::doSelect(new Criteria()), userListAction::DEFAULT_OFFSET, userListAction::COUNT_NEW_USERS);
            $this->users = $array;
        }
    }
}