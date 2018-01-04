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
        $isDeleted = false;

        $criteria = new Criteria();
        $criteria->add(self::LOGIN, $login);

        if (UserPeer::exists($criteria))
        {
            UserPeer::doDelete($criteria);
            $isDeleted = true;
        }
        return $isDeleted;
    }

    //Обновление данных пользователя в БД по ID
    public static function updateUser(string $id, string $firstName, string $lastName)
    {
        $criteria = new Criteria();
        $criteria->add(UserPeer::ID, $id);
        $criteria->add(UserPeer::FIRST_NAME, $firstName);
        $criteria->add(UserPeer::LAST_NAME, $lastName);

        UserPeer::doUpdate($criteria);
    }
}