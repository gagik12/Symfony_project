<?php

/**
 * @property sfForm $form
 * @property array $users
 */
class userActions extends sfActions
{
    public function executeLogin(sfWebRequest $request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            $this->redirect('@user_profile');
        }
        $this->form = new SignInForm();
        if ($request->isMethod(sfRequest::POST))
        {
            $this->processForm($request, $this->form);
        }
    }

    public function executeUserList(sfWebRequest $request)
    {
        $this->users = UserPeer::doSelect(new Criteria());
    }

    public function executeUserProfile(sfWebRequest $request)
    {
        $this->userFirstName = $this->getUser()->getLoggedUser()->getFirstName();
        $this->userLastName = $this->getUser()->getLoggedUser()->getLastName();
    }

    public function executeLogOut(sfWebRequest $request)
    {
        $this->getUser()->logOut();
        $this->redirect('@login');
        return sfView::NONE;
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
