<?php

class UserPeer extends BaseUserPeer
{
    public static function getUserByLogin($login)
    {
        $criteria = new Criteria();
        $criteria->add(UserPeer::LOGIN, $login);
        return UserPeer::doSelectOne($criteria);
    }

    public static function createUser($login, $password, $role)
    {
        $user = new User();
        $user->setLogin($login)->setPassword($password)->setRole($role);
        UserPeer::doInsert($user);
    }
}