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
            $this->processForm($request, $this->logInform);
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $userParameter = $request->getParameter($form->getName());
        $form->bind($userParameter);
        if ($form->isValid())
        {
            $userFromDatabase = UserPeer::getUserFromDatabase($userParameter[LogInForm::LOGIN], MD5($userParameter[LogInForm::PASSWORD]));
            $this->getUser()->logIn($userFromDatabase);
            $userRole = $this->getUser()->getLoggedUser()->getRole();
            $url = ($userRole == UserRole::ADMIN) ? '@user_list' : '@user_profile';
            $this->redirect($url);
        }
    }
}