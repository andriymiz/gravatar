<?php

namespace Andriymiz\Gravatar\Trait;

use Andriymiz\Gravatar\Gravatar;

trait GravatarTrait
{
    /**
     * @var Gravatar
     */
    private $gravatarInstance;

    /**
     * For identifying an identity in Gravatar system
     *
     * @return string
     */
    private function getGravatarEmail(): string
    {
        return $this->email;
    }

    /**
     * Gravatar Instance getter
     *
     * @return Gravatar
     */
    public function getGravatarInstance(): Gravatar
    {
        if ($this->gravatarInstance instanceof Gravatar) {
            return $this->gravatarInstance;
        }

        // Setup Gravatar Image
        $gravatar = new Gravatar($this->getGravatarEmail());
        $gravatar->setBaseUrl(config('gravatar.image.base_url'))
                 ->setDefault(config('gravatar.image.default'))
                 ->setForceDefault(config('gravatar.image.force_default'))
                 ->setSize(config('gravatar.image.size'))
                 ->setRating(config('gravatar.image.rating'));

        // Setup Gravatar Profile
        $gravatar->getProfile()
                 ->setBaseUrl(config('gravatar.profile.base_url'));

        return $this->gravatarInstance = $gravatar;
    }
}
