<?php

/** @property sfForm $logInform */
class logInAction extends sfAction
{
    public function execute($request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            $this->redirect('@user_profile');
        }
        $this->logInform = new LogInForm();
        if ($request->isMethod(sfRequest::POST))
        {
            $this->processForm($request);
        }
    }

    protected function processForm(sfWebRequest $request)
    {
        $this->logInform->bind($request->getParameter($this->logInform->getName()));
        if ($this->logInform->isValid())
        {
            $login = $this->logInform->getValue(LogInForm::LOGIN);
            $password = $this->logInform->getValue(LogInForm::PASSWORD);
            $userFromDatabase = UserPeer::getUserFromDatabase($login, $password);
            $user = $this->getUser();
            $user->logIn($userFromDatabase);
            $url = ($user->isAdmin()) ? '@user_list' : '@user_profile';
            $this->redirect($url);
        }
    }
}