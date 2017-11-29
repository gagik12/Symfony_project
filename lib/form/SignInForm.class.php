<?php

class SignInForm extends sfForm
{
    public function configure()
    {
        $this->setWidgets([
            'login' => new sfWidgetFormInputText([], ['placeholder' => 'Логин']),
            'password' => new sfWidgetFormInputPassword([], ['placeholder' => 'Пароль']),
        ]);
        $this->setValidators([
            'login' => new sfValidatorString(['required' => true], ['required' => 'Логин: обязательный параметр!']),
            'password' => new sfValidatorString(['required' => true], ['required' => 'Пароль: обязательный параметр!']),
        ]);
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(['callback' => [$this, 'checkUser']]));
        $this->getWidgetSchema()->setNameFormat('signIn[%s]');
    }

    public function checkUser($validator, $values)
    {
        if ($values['login'] && $values['password'])
        {
            $criteria = $this->getSignInCriteria($values);
            $user = UserPeer::doSelectOne($criteria, Propel::getConnection());
            if ($user)
            {
                $userInstance = sfContext::getInstance()->getUser();
                if ($userInstance->isAuthenticated())
                {
                    $userInstance->setAuthenticated(false);
                    $userInstance->clearCredentials();
                }
                $userInstance->setAuthenticated(true);

                $userInstance->setAttribute('role', $user->getRole());
                $userInstance->setAttribute('userName', $user->getFirstName());

                $userInstance->addCredential($user->getRole());
            }
            else
            {
                $error = new sfValidatorError($validator, 'Неправильное имя пользователя или пароль!');
                throw new sfValidatorErrorSchema($validator, ['login' => $error]);
            }
        }
    }

    private function getSignInCriteria($values)
    {
        $criteria = new Criteria();
        $criteria->add(UserPeer::LOGIN, $values['login']);
        $criteria->add(UserPeer::PASSWORD, MD5($values['password']));
        return $criteria;
    }
}
