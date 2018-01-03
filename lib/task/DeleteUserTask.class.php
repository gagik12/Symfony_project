<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 03.01.2018
 * Time: 22:42
 */

class DeleteUserTask extends isoBaseTask
{
    private const TASK_NAMESPACE = 'user';
    private const TASK_NAME = 'delete';
    private const LOGIN_ARGUMENT = 'login';
    private const CONNECTION_OPTION = "connection";

    public function configure()
    {
        $this->namespace = DeleteUserTask::TASK_NAMESPACE;
        $this->name = DeleteUserTask::TASK_NAME;
        $this->addArgument(DeleteUserTask::LOGIN_ARGUMENT, sfCommandArgument::REQUIRED);
        $this->addOptions([
            new sfCommandOption(DeleteUserTask::CONNECTION_OPTION, null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'propel'),
        ]);
    }

    public function executeTask($arguments = [], $options = [])
    {
        $login = $arguments[LogInForm::LOGIN];
        $isUserDeleted = UserPeer::deleteUser($login);
        $this->log($isUserDeleted ? "User has been deleted" : "User not found");
    }
}