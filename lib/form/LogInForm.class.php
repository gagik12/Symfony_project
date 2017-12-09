<?php

class LogInForm extends sfForm
{
    private const LOGIN = "login";
    private const PASSWORD = "password";

    private const ERROR_MESSAGES =  [
        "required_login" => "Логин: обязательный параметр!",
        "required_password" => "Пароль: обязательный параметр!",
        "user_not_found" => "Неправильное имя пользователя или пароль!",
    ];

    public function configure()
    {
        $this->setWidgets([
            LogInForm::LOGIN => new sfWidgetFormInputText([], ['placeholder' => 'Логин']),
            LogInForm::PASSWORD => new sfWidgetFormInputPassword([], ['placeholder' => 'Пароль']),
        ]);
        $this->setValidators([
            LogInForm::LOGIN  => new sfValidatorString(['required' => true], ['required' => LogInForm::ERROR_MESSAGES['required_login']]),
            LogInForm::PASSWORD => new sfValidatorString(['required' => true], ['required' => LogInForm::ERROR_MESSAGES['required_password']]),
        ]);
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(['callback' => [$this, 'checkUser']]));
        $this->getWidgetSchema()->setNameFormat('logIn[%s]');
    }

    public function checkUser($validator, $values)
    {
        if ($values[LogInForm::LOGIN] && $values[LogInForm::PASSWORD])
        {
            $criteria = $this->getLogInCriteria($values);
            $userFromDatabase = UserPeer::doSelectOne($criteria, Propel::getConnection());
            if ($userFromDatabase)
            {
                sfContext::getInstance()->getUser()->logIn($userFromDatabase);
            }
            else
            {
                $error = new sfValidatorError($validator, LogInForm::ERROR_MESSAGES['user_not_found']);
                throw new sfValidatorErrorSchema($validator, [LogInForm::LOGIN => $error]);
            }
        }
    }

    private function getLogInCriteria($values)
    {
        $criteria = new Criteria();
        $criteria->add(UserPeer::LOGIN, $values[LogInForm::LOGIN]);
        $criteria->add(UserPeer::PASSWORD, MD5($values[LogInForm::PASSWORD]));
        return $criteria;
    }
}
