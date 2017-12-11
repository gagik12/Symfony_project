<?php

class UserPeer extends BaseUserPeer
{
    public function getUserByLogin($login)
    {
        $criteria = new Criteria();
        $criteria->add(UserPeer::LOGIN, $login);
        return UserPeer::doSelectOne($criteria);
    }

}