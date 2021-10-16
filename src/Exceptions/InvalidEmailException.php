<?php

namespace Andriymiz\Gravatar\Exceptions;

use InvalidArgumentException;

class InvalidEmailException extends InvalidArgumentException
{
    /**
     * @param null|string $email
     */
    public function __construct(?string $email)
    {
        parent::__construct("The email `{$email}` is invalid.");
    }
}