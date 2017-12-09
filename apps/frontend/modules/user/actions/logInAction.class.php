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
        $form->bind($request->getParameter($form->getName()));
        if ($form->isValid())
        {
            $userRole = $this->getUser()->getLoggedUser()->getRole();
            $url = ($userRole == UserRole::ADMIN) ? '@user_list' : '@user_profile';
            $this->redirect($url);
        }
    }
}