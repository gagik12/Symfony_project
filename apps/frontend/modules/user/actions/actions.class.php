<?php

/**
 * @property sfForm $form
 * @property array $users
 */
class userActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
        return sfView::NONE;
    }

    public function executeSignIn(sfWebRequest $request)
    {
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

    public function executeLogOut(sfWebRequest $request)
    {
        $this->getUser()->logOut();
        $this->redirect('user/signIn');
        return sfView::NONE;
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()));
        if ($form->isValid())
        {
            $userRole = $this->getUser()->getUserFromDatabase()->getRole();
            $url = ($userRole == UserRole::ADMIN) ? 'user/userList' : 'hello_world/index';
            $this->redirect($url);
        }
    }
}
