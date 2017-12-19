<?php

class LogInForm extends sfForm
{
    public const LOGIN = "login";
    public const PASSWORD = "password";

    private const ERROR_MESSAGES = [
        "required_login" => "Логин: обязательный параметр!",
        "required_password" => "Пароль: обязательный параметр!",
        "user_not_found" => "Неправильное имя пользователя или пароль!",
    ];

    public function configure()
    {
        $this->setWidgets([
            LogInForm::LOGIN => new sfWidgetFormInputText([], ['placeholder' => 'Логин']),
            LogInForm::PASSWORD => new sfWidgetFormInputPassword([], ['placeholder' => 'Пароль']),
        ]);
        $this->setValidators([
            LogInForm::LOGIN => new sfValidatorString(['required' => true], ['required' => LogInForm::ERROR_MESSAGES['required_login']]),
            LogInForm::PASSWORD => new sfValidatorString(['required' => true], ['required' => LogInForm::ERROR_MESSAGES['required_password']]),
        ]);
        $this->validatorSchema->setPostValidator(new ValidatorUserExist());
        $this->getWidgetSchema()->setNameFormat('logIn[%s]');
    }

}
