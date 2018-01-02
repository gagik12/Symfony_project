<?php

class UserPeer extends BaseUserPeer
{
    public static function getUserFromDatabase(UserData $userData)
    {
        $criteria = new Criteria();
        $criteria->add(UserPeer::LOGIN, $userData->getLogin());
        $password = $userData->getPassword();
        if ($password)
        {
            $criteria->add(UserPeer::PASSWORD, md5($password));
        }
        return UserPeer::doSelectOne($criteria);
    }
}