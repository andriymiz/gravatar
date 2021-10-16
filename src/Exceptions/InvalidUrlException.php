<?php

namespace Andriymiz\Gravatar\Exceptions;

use InvalidArgumentException;

class InvalidUrlException extends InvalidArgumentException
{
    /**
     * @param null|string $url
     */
    public function __construct(?string $url)
    {
        parent::__construct("The url `{$url}` is invalid.");
    }
}