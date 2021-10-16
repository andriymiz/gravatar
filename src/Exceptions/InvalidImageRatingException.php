<?php

namespace Andriymiz\Gravatar\Exceptions;

use Andriymiz\Gravatar\Helpers\RatingHelper;
use InvalidArgumentException;

class InvalidImageRatingException extends InvalidArgumentException
{
    /**
     * @param null|string $rating
     */
    public function __construct(?string $rating)
    {
        $options = implode(', ', RatingHelper::OPTIONS);

        parent::__construct("The rating `{$rating}` is invalid. Supported: {$options}.");
    }
}