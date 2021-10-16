<?php

namespace Andriymiz\Gravatar\Contracts;

use Andriymiz\Gravatar\Gravatar;

interface GravatarInterface
{
    /**
     * Gravatar Instance getter
     *
     * @return Gravatar
     */
    public function getGravatarInstance(): Gravatar;
}
