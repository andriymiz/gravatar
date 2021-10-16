<?php

namespace Andriymiz\Gravatar\Helpers;

class ImageHelper
{
    /**
     * @var array
     */
    public const OPTIONS = [
        "",
        "404",
        "mp",
        "identicon",
        "monsterid",
        "wavatar",
        "retro",
        "robohash",
        "blank",
    ];

    /**
     * @param string $url
     *
     * @return bool
     */
    public static function isInvalidDefaultOption(string $option): bool
    {
        return ! in_array($option, self::OPTIONS);
    }
}
