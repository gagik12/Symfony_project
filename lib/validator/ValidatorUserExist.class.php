<?php

class ValidatorUserExist extends sfValidatorBase
{
    protected function configure($options = [], $messages = [])
    {
    }

    protected function doClean($value)
    {
        $criteria = new Criteria();
        $criteria->add(UserPeer::LOGIN, $value[LogInForm::LOGIN]);
        $criteria->add(UserPeer::PASSWORD, MD5($value[LogInForm::PASSWORD]));
        if (!UserPeer::exists($criteria))
        {
            throw new sfValidatorError($this, 'Неправильное имя пользователя или пароль!');
        }
    }
}