<?php

namespace Andriymiz\Gravatar\Helpers;

class UrlHelper
{
    /**
     * @param string $url
     *
     * @return bool
     */
    public static function isInvalid(string $url): bool
    {
        $url = trim($url);

        return filter_var($url, FILTER_VALIDATE_URL) === false
            || substr($url, 0, 4) !== "http";
    }
}
