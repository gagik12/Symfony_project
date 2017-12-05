<?php

class EnvironmentType
{
    const PRODUCTION = "prod";
    const DEVELOPMENT = "dev";
    const TEST = "test";

    public static function isTest()
    {
        return (sfConfig::get('sf_environment') === self::TEST);
    }
}