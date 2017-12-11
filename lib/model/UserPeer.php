<?php

class UserPeer extends BaseUserPeer
{
    public function getUserByLogin($login)
    {
        $criteria = new Criteria();
        $criteria->add(UserPeer::LOGIN, $login);
        return UserPeer::doSelectOne($criteria);
    }

    public function createUser($login, $password, $role)
    {
        $user = new User();
        $user->setLogin($login)->setPassword($password)->setRole($role);
        UserPeer::doInsert($user);
    }
}