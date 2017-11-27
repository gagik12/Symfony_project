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
            'login' => new sfValidatorString(['required' => TRUE], ['required' => 'Логин: обязательный параметр!']),
            'password' => new sfValidatorString(['required' => TRUE], ['required' => 'Пароль: обязательный параметр!']),
        ]);
        $this->validatorSchema->setPostValidator(new sfValidatorCallback(['callback' => [$this, 'checkUser']]));
        $this->getWidgetSchema()->setNameFormat('signin[%s]');
    }

    public function checkUser($validator, $values)
    {
        if ($values['login'] && $values['password'])
        {
            $criteria = $this->getSignInCriteria($values);
            $user = UserPeer::doSelectOne($criteria, Propel::getConnection());
            if ($user)
            {
                sfContext::getInstance()->getUser()->setAuthenticated(true);

                sfContext::getInstance()->getUser()->setAttribute('role', $user->getRole());
                sfContext::getInstance()->getUser()->setAttribute('userName', $user->getFirstName());

                sfContext::getInstance()->getUser()->addCredential($user->getRole());
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
