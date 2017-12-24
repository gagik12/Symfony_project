<?php

/** @property array $users */
class userListAction extends sfAction
{
    private const MAX_USER_COUNT_IN_LIST = 10;
    private const DEFAULT_OFFSET = 0;

    public function execute($request)
    {
        if($request->isXmlHttpRequest())
        {
            $page = $request->getParameter('page');
            $offset = $page * userListAction::MAX_USER_COUNT_IN_LIST;
            $array = array_slice(UserPeer::doSelect(new Criteria()), $offset, userListAction::MAX_USER_COUNT_IN_LIST);
            return $this->renderPartial("user_list", ['users' => $array]);
        }
        else
        {
            $array = array_slice(UserPeer::doSelect(new Criteria()), userListAction::DEFAULT_OFFSET, userListAction::MAX_USER_COUNT_IN_LIST);
            $this->users = $array;
        }
    }
}