<?php

class ValidatorUserExist extends sfValidatorSchema
{
    protected function doClean($values)
    {
        $criteria = new Criteria();
        $criteria->add(UserPeer::LOGIN, $values[LogInForm::LOGIN]);
        $criteria->add(UserPeer::PASSWORD, MD5($values[LogInForm::PASSWORD]));
        if (!UserPeer::exists($criteria))
        {
            throw new sfValidatorError($this, 'Неправильное имя пользователя или пароль!');
        }
        return $values;
    }
}