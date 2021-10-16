<?php

namespace Andriymiz\Gravatar\Helpers;

class RatingHelper
{
    /**
     * @var array
     */
    public const OPTIONS = ['g', 'pg', 'r', 'x'];

    /**
     * @param string $option
     *
     * @return bool
     */
    public static function isInvalid(string $option): bool
    {
        return ! in_array($option, self::OPTIONS);
    }
}
