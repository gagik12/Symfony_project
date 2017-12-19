<?php

class Functions
{
    public static function getMD5Password(string $password): string
    {
        return MD5($password);
    }
}