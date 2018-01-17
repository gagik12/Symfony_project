<?php

class FileLogger
{
    private const LOG_FILE_NAME = 'application.log';
    private const DATE_FORMAT = 'd.m.Y - H:i:s';
    private const MESSAGE_FORMAT = '-- Date: [%s]; Message Type: [%s]; Message: [%s]; Variable Info: [%s]';

    const DEBUG = 'DEBUG';
    const ERROR = 'ERROR';
    const NOTICE = 'NOTICE';

    private $logFileDir;
    private $file = null;

    public function __construct()
    {
        $this->logFileDir = sfConfig::get('sf_root_dir') . '/log/';
        $this->openLogFile();
    }

    public function __destruct()
    {
        $this->closeLogFile();
    }

    public function log(string $message, string $messageType = FileLogger::DEBUG, $value = null)
    {
        $logMessage = $this->formatMessage($message, $messageType, $value);
        $this->writeToFile($logMessage);
    }

    private function formatMessage(string $message, string $messageType, $value): string
    {
        $date = $this->getDate();
        $variableInfo = var_export($value, true);

        return sprintf(FileLogger::MESSAGE_FORMAT, $date, $messageType, $message, $variableInfo);
    }

    private function getDate(): string
    {
        return date(FileLogger::DATE_FORMAT);
    }

    private function writeToFile(string $message)
    {
        flock($this->file, LOCK_EX);
        fwrite($this->file, $message . PHP_EOL);
        flock($this->file, LOCK_UN);
    }

    private function openLogFile()
    {
        if (!is_dir($this->logFileDir))
        {
            if (!mkdir($this->logFileDir))
            {
                throw new FileLoggerException("Не удается создать папку {$this->logFileDir}");
            }
        }

        if (!$this->file = fopen($this->logFileDir . FileLogger::LOG_FILE_NAME, 'a+'))
        {
            throw new FileLoggerException("Не удается открыть файл {${FileLogger::LOG_FILE_NAME}}");
        }
    }

    private function closeLogFile()
    {
        fclose($this->file);
    }
}