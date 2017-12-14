<?php

class UserPeer extends BaseUserPeer
{
    public static function getUserFromDatabase($login, $password = null)
    {
        $criteria = new Criteria();
        $criteria->add(UserPeer::LOGIN, $login);
        if($password)
        {
            $criteria->add(UserPeer::PASSWORD, $password);
        }
        return UserPeer::doSelectOne($criteria);
    }

    public static function createUser($login, $password, $role, $firstName = "", $lastName = "")
    {
        $user = new User();
        $user->setLogin($login)
             ->setPassword(MD5($password))
             ->setFirstName($firstName)
             ->setLastName($lastName)
             ->setRole($role);
        $user->save();
    }
}