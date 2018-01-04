<?php

class EditUserForm extends sfForm
{
    public const FIRST_NAME = "first_name";
    public const LAST_NAME = "last_name";

    private const MAX_FIRST_AND_LAST_NAME_LENGTH = 255;

    public function configure()
    {
        $loggedUser = sfContext::getInstance()->getUser()->getLoggedUser();

        $this->setWidgets([
            EditUserForm::FIRST_NAME => new sfWidgetFormInputText([], ['placeholder' => 'Имя']),
            EditUserForm::LAST_NAME => new sfWidgetFormInputText([], ['placeholder' => 'Фамилия']),
        ]);

        $this->setValidators([
            EditUserForm::FIRST_NAME => new sfValidatorString(['max_length' => EditUserForm::MAX_FIRST_AND_LAST_NAME_LENGTH, 'required' => false]),
            EditUserForm::LAST_NAME => new sfValidatorString(['max_length' => EditUserForm::MAX_FIRST_AND_LAST_NAME_LENGTH, 'required' => false]),
        ]);

        $this->getWidgetSchema()->setNameFormat('edit[%s]');
    }

}
