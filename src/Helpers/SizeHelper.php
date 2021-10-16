<?php

namespace Andriymiz\Gravatar\Helpers;

class SizeHelper
{
    /**
     * @var int
     */
    public const MIN = 1;

    /**
     * @var int
     */
    public const MAX = 2048;

    /**
     * @param int $size
     *
     * @return bool
     */
    public static function isInvalid(int $size): bool
    {
        return $size < self::MIN || $size > self::MAX;
    }
}
