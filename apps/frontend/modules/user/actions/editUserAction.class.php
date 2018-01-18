<?php

/**
 * @property sfForm $editUserForm
 * @property User $user
 * @property boolean $isDeleteButtonVisible
 */
class editUserAction extends sfAction
{
    private const PARAMETER = 'login';

    /**
     * @param sfWebRequest $request
     * @return string
     */
    public function execute($request)
    {
        $this->editUserForm = new EditUserForm();

        if ($request->hasParameter(editUserAction::PARAMETER) && !$this->getUser()->isAdmin())
        {
            $this->redirect('@edit_my_profile');
        }

        $loginParameter = $request->getParameter(editUserAction::PARAMETER);

        $this->user = $loginParameter ? $user = UserPeer::getUserFromDatabase($loginParameter) : $this->getUser()->getLoggedUser();
        $this->isDeleteButtonVisible = $this->getUser()->getLogin() != $user->getLogin();

        if ($request->isMethod(sfRequest::POST))
        {
            $this->processForm($request, $this->user->getId());
        }
        return sfView::SUCCESS;
    }

    private function processForm(sfWebRequest $request, int $userId)
    {
        $this->editUserForm->bind($request->getParameter($this->editUserForm->getName()));
        if ($this->editUserForm->isValid())
        {
            $firstName = $this->editUserForm->getValue(EditUserForm::FIRST_NAME);
            $lastName = $this->editUserForm->getValue(EditUserForm::LAST_NAME);

            UserPeer::updateUser($userId, $firstName, $lastName);

            if ($userId == $this->getUser()->getId())
            {
                $this->getUser()->updateLoggedUser($firstName, $lastName);
            }

            $this->redirect('@user_list');
        }
    }
}