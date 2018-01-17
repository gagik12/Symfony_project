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

    public static function deleteUser(string $login): bool
    {
        $isUserDeleted = false;
        $user = UserPeer::getUserFromDatabase($login);
        if ($user)
        {
            $user->delete();
            $isUserDeleted = true;
        }
        return $isUserDeleted;
    }

    public static function updateUser(string $id, string $firstName, string $lastName)
    {
        $criteria = new Criteria();
        $criteria->add(UserPeer::ID, $id);
        $criteria->add(UserPeer::FIRST_NAME, $firstName);
        $criteria->add(UserPeer::LAST_NAME, $lastName);

        UserPeer::doUpdate($criteria);
    }
}