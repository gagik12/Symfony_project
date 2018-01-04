<?php

/** @property sfForm $editUserForm */
class editUserAction extends sfAction
{
    private const PARAMETER = 'login';

    public function execute($request)
    {
        $this->editUserForm = new EditUserForm();

        if ($request->hasParameter(editUserAction::PARAMETER) && !$this->getUser()->isAdmin())
        {
            $this->redirect('@edit_my_profile');
        }
        //если нет параметра login, то редактируем данные текущего пользователя
        $login = $request->hasParameter(editUserAction::PARAMETER) ? $request->getParameter(editUserAction::PARAMETER) : $this->getUser()->getLogin();

        $user = UserPeer::getUserFromDatabase($login);

        $this->currentFirstName = $user->getFirstName();
        $this->currentLastName = $user->getLastName();

        if ($request->isMethod(sfRequest::POST))
        {
            $this->processForm($request, $user->getId());
        }
    }

    private function processForm(sfWebRequest $request, int $userId)
    {
        $this->editUserForm->bind($request->getParameter($this->editUserForm->getName()));
        if ($this->editUserForm->isValid())
        {
            $firstName = $this->editUserForm->getValue(EditUserForm::FIRST_NAME);
            $lastName = $this->editUserForm->getValue(EditUserForm::LAST_NAME);

            UserPeer::updateUser($userId, $firstName, $lastName);
            //если обновили данные текущего пользователя в БД то обновляем данные в сессионном пользователе
            if ($userId == $this->getUser()->getId())
            {
                $this->getUser()->updateLoggedUser($firstName, $lastName);
            }

            $this->redirect('@user_list');
        }
    }
}