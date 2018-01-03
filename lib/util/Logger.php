<?php

class Logger extends sfFileLogger
{
    public function log($message, $priority = self::INFO)
    {
        if ($priority == self::INFO)
        {
            $variableInfo = var_export($message, true);
            $this->doLog($variableInfo, $priority);
        }
    }
}