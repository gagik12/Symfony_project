<?php

class registrationAction extends sfAction
{
    private const DEFAULT_ROLE = UserRole::USER;

    public function execute($request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            $this->redirect('@user_profile');
        }
        $this->registrationForm = new UserForm();
        if ($request->isMethod(sfRequest::POST))
        {
            $this->processForm($request);
        }
    }

    protected function processForm(sfWebRequest $request)
    {
        $userParameter = $request->getParameter($this->registrationForm->getName());
        $this->registrationForm->bind($userParameter);
        if ($this->registrationForm->isValid())
        {
            $userData = new UserData($this->registrationForm->getValues());
            UserPeer::createUser($userData, registrationAction::DEFAULT_ROLE);
            $this->redirect('@log_in');
        }
    }
}