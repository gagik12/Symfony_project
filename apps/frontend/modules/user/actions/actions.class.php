<?php

/**
 * @property sfForm $form
 * @property array $users
 */
class userActions extends sfActions
{
    public function executeIndex(sfWebRequest $request)
    {
    }

    public function executeSignIn(sfWebRequest $request)
    {
        $this->form = new SignInForm();
        if ($request->isMethod('post'))
        {
            $this->processForm($request, $this->form);
        }
    }

    public function executeUserList(sfWebRequest $request)
    {
        if (!$this->getUser()->isAuthenticated() || ($this->getUser()->getAttribute('role') != "admin"))
        {
            $this->redirect('user/signIn');
        }
        $this->users = UserPeer::doSelect(new Criteria());
    }

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()));
        if ($form->isValid())
        {
            $url = ($this->getUser()->getAttribute('role') == "admin") ? 'user/userList' : 'hello_world/index';
            $this->redirect($url);
        }
    }
}
