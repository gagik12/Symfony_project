<?php

/** @property UserForm $registrationForm */
class registrationAction extends sfAction
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
        $this->registrationForm = new UserForm();
        if ($request->isMethod(sfRequest::POST))
        {
            $this->processForm($request);
        }
        return sfView::SUCCESS;
    }

    protected function processForm(sfWebRequest $request)
    {
        $userParameter = $request->getParameter($this->registrationForm->getName());
        $this->registrationForm->bind($userParameter);
        if ($this->registrationForm->isValid())
        {
            $this->registrationForm->populateUser();
            $user = $this->registrationForm->getUser();
            $user->save();
            $this->redirect('@log_in');
        }
    }
}