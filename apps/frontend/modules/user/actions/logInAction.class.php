<?php

/** @property sfForm $logInform */
class logInAction extends sfAction
{
    /**
     * @param sfWebRequest $request
     * @return string
     */
    public function execute($request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            $this->redirect('@profile');
        }
        $this->logInform = new LogInForm();
        if ($request->isMethod(sfRequest::POST))
        {
            $this->processForm($request);
        }
        return sfView::SUCCESS;
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
            $url = ($user->isAdmin()) ? '@user_list' : '@profile';
            $this->redirect($url);
        }
    }
}