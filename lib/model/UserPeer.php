<?php

class UserPeer extends BaseUserPeer
{
    public static function getUserFromDatabase($login, $password = null)
    {
        $criteria = new Criteria();
        $criteria->add(UserPeer::LOGIN, $login);
        if ($password)
        {
            $criteria->add(UserPeer::PASSWORD, $password);
        }
        return UserPeer::doSelectOne($criteria);
    }

    public static function createUser($login, $password, $role, $firstName = "", $lastName = "")
    {
        $user = new User();

        $user->setLogin($login);
        $user->setPassword(MD5($password));
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setRole($role);

        $user->save();
    }
}