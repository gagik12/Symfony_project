<?php

class PasswordEncoder
{
    public static function getEncodedPassword(string $password)
    {
        return md5($password);
    }
}