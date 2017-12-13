<?php

/**
 * User form base class.
 *
 * @method User getObject() Returns the current form's model object
 *
 * @package    project
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseUserForm extends BaseFormPropel
{
    public const LOGIN = "login";
    public const PASSWORD = "password";
    public const FIRST_NAME = "first_name";
    public const LAST_NAME = "last_name";
    private const ID = "ID";

    private const ERROR_MESSAGES = [
        "required_login" => "Логин: обязательный параметр!",
        "required_password" => "Пароль: обязательный параметр!",
        "user_exist" => "Пользователь с таким логином уже зарегистрирован!",
    ];

    public function setup()
    {
        $this->setWidgets([
            BaseUserForm::ID => new sfWidgetFormInputHidden(),
            BaseUserForm::LOGIN => new sfWidgetFormInputText([], ['placeholder' => 'Логин']),
            BaseUserForm::PASSWORD => new sfWidgetFormInputPassword([], ['placeholder' => 'Пароль']),
            BaseUserForm::FIRST_NAME => new sfWidgetFormInputText([], ['placeholder' => 'Имя']),
            BaseUserForm::LAST_NAME => new sfWidgetFormInputText([], ['placeholder' => 'Фамилие']),
        ]);

        $this->setValidators([
            BaseUserForm::ID => new sfValidatorPropelChoice(['model' => 'User', 'column' => 'id', 'required' => false]),
            BaseUserForm::LOGIN => new sfValidatorString(['max_length' => 50], ['required' => BaseUserForm::ERROR_MESSAGES['required_login']]),
            BaseUserForm::PASSWORD => new sfValidatorString(['max_length' => 100], ['required' => BaseUserForm::ERROR_MESSAGES['required_password']]),
            BaseUserForm::FIRST_NAME => new sfValidatorString(['max_length' => 255, 'required' => false]),
            BaseUserForm::LAST_NAME => new sfValidatorString(['max_length' => 255, 'required' => false]),
        ]);

        $this->getValidatorSchema()->setPostValidator(new sfValidatorPropelUnique([
            'model' => 'User',
            'column' => BaseUserForm::LOGIN,
        ], ['invalid' => BaseUserForm::ERROR_MESSAGES['user_exist']]));

        $this->getWidgetSchema()->setNameFormat('user[%s]');

        $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

        parent::setup();
    }

    public function getModelName()
    {
        return 'User';
    }

}
