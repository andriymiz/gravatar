<?php

namespace Andriymiz\Gravatar\Helpers;

class EmailHelper
{
    /**
     * All URLs on Gravatar are based on the use of the hashed value of an
     * email address.
     *
     * @param string $email
     *
     * @return string
     */
    public static function hash(string $email): string
    {
        return md5(strtolower(trim($email)));
    }

    /**
     * @param string $email
     *
     * @return bool
     */
    public static function isInvalid(string $email): bool
    {
        return filter_var(trim($email), FILTER_VALIDATE_EMAIL) === false;
    }
}