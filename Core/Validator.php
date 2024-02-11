<?php

namespace Core;

class Validator
{
    public static function email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function password($password): bool
    {
       return (bool)$password;
    }
}