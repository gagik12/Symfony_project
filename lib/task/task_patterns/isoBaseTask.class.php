<?php

/**
 * Adds a custom behavior: handles errors and exceptions
 *
 */
abstract class isoBaseTask extends sfBaseTask
{
    abstract protected function executeTask($arguments = [], $options = []);

    final protected function execute($arguments = [], $options = [])
    {
        $this->initializeDatabaseManager();
        $this->executeTask($arguments, $options);
    }

    protected function initializeDatabaseManager()
    {
        new sfDatabaseManager($this->configuration);
    }
}
