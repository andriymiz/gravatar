<?php

namespace Andriymiz\Gravatar\Exceptions;

use Andriymiz\Gravatar\Helpers\ImageHelper;
use InvalidArgumentException;

class InvalidDefaultImageException extends InvalidArgumentException
{
    /**
     * @param null|string $url
     */
    public function __construct(?string $url)
    {
        $options = implode(', ', ImageHelper::OPTIONS);

        parent::__construct("The default option `{$url}` is invalid. Supported: {$options} and URL.");
    }
}