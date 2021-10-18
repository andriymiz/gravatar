<?php

namespace Andriymiz\Gravatar\Traits;

use Andriymiz\Gravatar\Gravatar;
use Andriymiz\Gravatar\GravatarStoragable;

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
        $gravatar = config('gravatar.storage.disk_name')
            ? new GravatarStoragable($this->getGravatarEmail())
            : new Gravatar($this->getGravatarEmail());
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
