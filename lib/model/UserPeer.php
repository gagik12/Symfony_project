<?php

class UserPeer extends BaseUserPeer
{
    public static function getUserFromDatabase(string $login, string $password = null)
    {
        $criteria = new Criteria();
        $criteria->add(UserPeer::LOGIN, $login);

        if ($password)
        {
            $criteria->add(UserPeer::PASSWORD, md5($password));
        }
        return UserPeer::doSelectOne($criteria);
    }
}