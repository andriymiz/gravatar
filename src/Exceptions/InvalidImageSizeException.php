<?php

namespace Andriymiz\Gravatar\Exceptions;

use Andriymiz\Gravatar\Helpers\SizeHelper;
use InvalidArgumentException;

class InvalidImageSizeException extends InvalidArgumentException
{
    /**
     * @param null|int $size
     */
    public function __construct(?int $size)
    {
        $min = SizeHelper::MIN;
        $max = SizeHelper::MAX;

        parent::__construct("The size `{$size}` is invalid. Must be from {$min} to {$max}.");
    }
}