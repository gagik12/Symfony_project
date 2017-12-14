<?php

class UserInfoTask extends sfPropelBaseTask
{
    private const TASK_NAMESPACE = 'user';
    private const TASK_NAME = 'info';
    private const CONNECTION_OPTION = "connection";
    private const LOGIN_ARGUMENT = 'login';

    public function configure()
    {
        $this->namespace = UserInfoTask::TASK_NAMESPACE;
        $this->name = UserInfoTask::TASK_NAME;
        $this->addArgument(UserInfoTask::LOGIN_ARGUMENT, sfCommandArgument::REQUIRED);
        $this->addOptions([
            new sfCommandOption(UserInfoTask::CONNECTION_OPTION, null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
        ]);
    }

    public function execute($arguments = [], $options = [])
    {
        $login = $arguments[UserInfoTask::LOGIN_ARGUMENT];
        $databaseManager = new sfDatabaseManager($this->configuration);
        $user = UserPeer::getUserFromDatabase($login);
        if ($user)
        {
            $this->printUserInfo($user);
        }
        else
        {
            $this->log("User not found!");
        }
    }

    private function printUserInfo($user)
    {
        $login = $user->getLogin();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();
        $role = $user->getRole();

        $outputText = "";
        if ($firstName || $lastName)
        {
            $firstNameText = $firstName ? "First name - $firstName, " : "";
            $lastNameText = $lastName ? "Last name - $lastName, " : "";
            $outputText .= $firstNameText . $lastNameText;
        }
        else
        {
            $outputText .= "Login - $login, ";
        }
        $outputText .= "Role - $role";
        $this->log($outputText);
    }
}