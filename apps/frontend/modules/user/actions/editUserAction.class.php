<?php

/**
 * @property sfForm $editUserForm
 * @property string $currentFirstName
 * @property string $currentLastName
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

        $login = $request->getParameter(editUserAction::PARAMETER);
        //если нет параметра login, то редактируем данные текущего пользователя
        $user = $login ? $user = UserPeer::getUserFromDatabase($login) : $this->getUser()->getLoggedUser();

        $this->currentFirstName = $user->getFirstName();
        $this->currentLastName = $user->getLastName();

        if ($request->isMethod(sfRequest::POST))
        {
            $this->processForm($request, $user->getId());
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
            //если обновили данные текущего пользователя в БД то обновляем данные в сессии
            if ($userId == $this->getUser()->getId())
            {
                $this->getUser()->updateLoggedUser($firstName, $lastName);
            }

            $this->redirect('@user_list');
        }
    }
}