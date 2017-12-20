<?php

class CreateUserTask extends isoBaseTask
{
    private const TASK_NAMESPACE = 'user';
    private const TASK_NAME = 'create';
    private const LOGIN_ARGUMENT = 'login';
    private const PASSWORD_ARGUMENT = 'password';
    private const CONNECTION_OPTION = "connection";
    private const ROLE_OPTION = "role";
    private const DEFAULT_ROLE = 'user';

    public function configure()
    {
        $this->namespace = CreateUserTask::TASK_NAMESPACE;
        $this->name = CreateUserTask::TASK_NAME;
        $this->addArgument(CreateUserTask::LOGIN_ARGUMENT, sfCommandArgument::REQUIRED);
        $this->addArgument(CreateUserTask::PASSWORD_ARGUMENT, sfCommandArgument::REQUIRED);
        $this->addOptions([
            new sfCommandOption(CreateUserTask::CONNECTION_OPTION, null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
            new sfCommandOption(CreateUserTask::ROLE_OPTION, null, sfCommandOption::PARAMETER_REQUIRED, 'Role', CreateUserTask::DEFAULT_ROLE),
        ]);
    }

    public function executeTask($arguments = [], $options = [])
    {
        $role = $options[CreateUserTask::ROLE_OPTION];
        $userData = new UserData($arguments);
        if ($this->checkUser($userData, $role))
        {
            UserPeer::createUser($userData, $role);
            $this->log("User has been created.");
        }
    }

    private function checkUser(UserData $userData, string $role)
    {
        $form = new UserForm();
        $userParameter = [
            CreateUserTask::LOGIN_ARGUMENT => $userData->getLogin(),
            CreateUserTask::PASSWORD_ARGUMENT => $userData->getPassword(),
            CreateUserTask::ROLE_OPTION => $role,
        ];
        $form->bind($userParameter);
        $isValid = $form->isValid();
        if (!$isValid)
        {
            $errors = $form->getErrorSchema()->getErrors();
            foreach ($errors as $name => $error)
            {
                $this->log($error);
            }
        }
        return $isValid;
    }
}