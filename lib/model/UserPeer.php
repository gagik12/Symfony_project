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
            $criteria->add(UserPeer::PASSWORD, Functions::getMD5Password($password));
        }
        return UserPeer::doSelectOne($criteria);
    }

    public static function createUser(UserData $userData, $role)
    {
        $user = new User();

        $user->setLogin($userData->getLogin());
        $user->setPassword($userData->getPassword());
        $user->setFirstName($userData->getFirstName());
        $user->setLastName($userData->getLastName());
        $user->setRole($role);

        $user->save();
    }
}