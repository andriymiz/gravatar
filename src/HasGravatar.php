<?php

namespace Andriymiz\Gravatar;

interface HasGravatar
{
    /**
     * Getter
     */
    public function getGravatarAttribute();

    /**
     * Save gravatar from gravatar.com
     */
    public function storeGravatar();
}
