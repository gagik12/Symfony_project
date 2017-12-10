<?php

class UserInfoTask extends sfPropelBaseTask
{
    private $connection;

    private const TASK_NAMESPACE = 'user';
    private const TASK_NAME = 'info';
    private const LOGIN_ARGUMENT = 'login';

    private const QUERY_SELECT_FORMAT = "SELECT login, first_name, last_name, role FROM user WHERE login = '%s'";

    private function getUserInfo($login)
    {
        $query = sprintf(UserInfoTask::QUERY_SELECT_FORMAT, $login);
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    private function getConnection($options)
    {
        $databaseManager = new sfDatabaseManager($this->configuration);
        return $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();
    }

    private function printUserInfo($userInfo)
    {
        $isSetFirstAndLastName = ($userInfo->first_name && $userInfo->last_name);
        $outputText =  $isSetFirstAndLastName ? "First name - $userInfo->first_name, Last name - $userInfo->last_name, Role - $userInfo->role"
            : $outputText = "Login - $userInfo->login";
        $this->log($outputText);
    }

    public function configure()
    {
        $this->namespace = UserInfoTask::TASK_NAMESPACE;
        $this->name = UserInfoTask::TASK_NAME;
        $this->addArgument(UserInfoTask::LOGIN_ARGUMENT, sfCommandArgument::REQUIRED);
        $this->addOptions([
            new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
        ]);
    }

    public function execute($arguments = [], $options = [])
    {
        $login = $arguments[UserInfoTask::LOGIN_ARGUMENT];
        $this->connection = $this->getConnection($options);

        $userInfo = $this->getUserInfo($login);

        $this->printUserInfo($userInfo);
    }
}