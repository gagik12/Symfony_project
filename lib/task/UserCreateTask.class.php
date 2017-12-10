<?php

class UserCreateTask extends sfPropelBaseTask
{
    private $connection;

    private const TASK_NAMESPACE = 'user';
    private const TASK_NAME = 'create';

    private const LOGIN_ARGUMENT = 'login';
    private const PASSWORD_ARGUMENT = 'password';

    private const CONNECTION_OPTION = "connection";
    private const ROLE_OPTION = "role";

    private const QUERY_INSERT_FORMAT = "INSERT INTO user (login, password, role) VALUES ('%s', '%s', '%s')";

    private function getConnection($options)
    {
        $databaseManager = new sfDatabaseManager($this->configuration);
        return $databaseManager->getDatabase($options[UserCreateTask::CONNECTION_OPTION] ? $options[UserCreateTask::CONNECTION_OPTION] : null)->getConnection();
    }

    private static function generateMD5Password($password)
    {
        return MD5($password);
    }

    private function createUser($login, $password, $role)
    {
        $query = sprintf(UserCreateTask::QUERY_INSERT_FORMAT, $login, $this->generateMD5Password($password), $role);
        $statement = $this->connection->prepare($query);
        $statement->execute();
    }

    private function checkUser($login, $password, $role)
    {
        $validators = [
            UserCreateTask::LOGIN_ARGUMENT => new sfValidatorString([
                'min_length' => 4,
                'max_length' => 50,
            ]),
            UserCreateTask::PASSWORD_ARGUMENT => new sfValidatorString([
                'min_length' => 4,
                'max_length' => 100,
            ]),
            UserCreateTask::ROLE_OPTION => new sfValidatorRegex(['pattern' => "/^(user|admin)$/",], ['invalid' => 'Role can only be user or admin.']),
        ];

        $validatorSchema = new sfValidatorSchema($validators);
        $validatorSchema->clean([
            UserCreateTask::LOGIN_ARGUMENT => $login,
            UserCreateTask::PASSWORD_ARGUMENT => $password,
            UserCreateTask::ROLE_OPTION => $role,
        ]);
    }

    public function configure()
    {
        $this->namespace = UserCreateTask::TASK_NAMESPACE;
        $this->name = UserCreateTask::TASK_NAME;
        $this->addArgument(UserCreateTask::LOGIN_ARGUMENT, sfCommandArgument::REQUIRED);
        $this->addArgument(UserCreateTask::PASSWORD_ARGUMENT, sfCommandArgument::REQUIRED);
        $this->addOptions([
            new sfCommandOption(UserCreateTask::CONNECTION_OPTION, null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
            new sfCommandOption(UserCreateTask::ROLE_OPTION, null, sfCommandOption::PARAMETER_REQUIRED, 'Role', 'user'),
        ]);
    }

    public function execute($arguments = [], $options = [])
    {
        $this->connection = $this->getConnection($options);

        $login = $arguments[UserCreateTask::LOGIN_ARGUMENT];
        $password = $arguments[UserCreateTask::PASSWORD_ARGUMENT];
        $role = $options[UserCreateTask::ROLE_OPTION];

        $this->checkUser($login, $password, $role);
        $this->createUser($login, $password, $role);
    }
}