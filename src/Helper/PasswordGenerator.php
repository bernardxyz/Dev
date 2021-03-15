<?php

namespace App\Helper;


class PasswordGenerator
{
    public static function makeRandomPassword($length = 8)
    {
        return substr(self::getRandomString(), 0, $length);
    }

    public static function getRandomString()
    {
        return md5(uniqid(rand(), true));
    }
}