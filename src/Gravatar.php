<?php

namespace Andriymiz\Gravatar;

use Andriymiz\Gravatar\Exceptions\InvalidDefaultImageException;
use Andriymiz\Gravatar\Exceptions\InvalidEmailException;
use Andriymiz\Gravatar\Exceptions\InvalidImageRatingException;
use Andriymiz\Gravatar\Exceptions\InvalidImageSizeException;
use Andriymiz\Gravatar\Exceptions\InvalidUrlException;
use Andriymiz\Gravatar\Helpers\EmailHelper;
use Andriymiz\Gravatar\Helpers\ImageHelper;
use Andriymiz\Gravatar\Helpers\RatingHelper;
use Andriymiz\Gravatar\Helpers\SizeHelper;
use Andriymiz\Gravatar\Helpers\UrlHelper;

class Gravatar
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var string
     */
    private $baseUrl = 'https://www.gravatar.com/avatar';

    /**
     * @var string
     */
    private $default = '';

    /**
     * @var bool
     */
    private $forceDefault = false;

    /**
     * @var string
     */
    private $rating = 'g';

    /**
     * @var int
     */
    private $size = 80;

    /**
     * @var string
     */
    private $ext = '';

    /**
     * @var GravatarProfile
     */
    private $profile;

    /**
     * Make a Gravatar instance.
     *
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->setEmail($email);
    }

    /**
     * TODO: Add getting url from local stored file
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getGravatarImageSrc();
    }

    /**
     * Set user email.
     *
     * @param string $email
     *
     * @return Gravatar
     *
     * @throws InvalidEmailException
     */
    private function setEmail(string $email): self
    {
        if (EmailHelper::isInvalid($email)) {
            throw new InvalidEmailException($email);
        }

        $this->email = trim($email);
        $this->hash = EmailHelper::hash($this->email);

        return $this;
    }

    /**
     * Set user base url.
     *
     * @param string $url
     *
     * @return Gravatar
     *
     * @throws InvalidUrlException
     */
    public function setBaseUrl(string $url): self
    {
        if (UrlHelper::isInvalid($url)) {
            throw new InvalidUrlException($url);
        }

        $this->baseUrl = trim($url, " \t\n\r\0\x0B\\");

        return $this;
    }

    /**
     * Set default image.
     *
     * @param string $option
     *
     * @return Gravatar
     *
     * @throws InvalidDefaultImageException
     */
    public function setDefault(string $option = ''): self
    {
        if (
            ImageHelper::isInvalidDefaultOption($option)
            && UrlHelper::isInvalid($option)
        ) {
            throw new InvalidDefaultImageException($option);
        }
        
        $this->default = $option;

        return $this;
    }

    /**
     * Set force default image.
     *
     * @param bool $force
     *
     * @return Gravatar
     */
    public function setForceDefault(bool $force = true): self
    {
        $this->forceDefault = $force;

        return $this;
    }

    /**
     * Set the avatar size to use.
     *
     * @param int $size
     *
     * @return Gravatar
     *
     * @throws InvalidImageSizeException
     */
    public function setSize(int $size): self
    {
        if (SizeHelper::isInvalid($size)) {
            throw new InvalidImageSizeException($size);
        }

        $this->size = $size;

        return $this;
    }

    /**
     * Set the maximum allowed rating for avatars.
     *
     * @param string $rating
     *
     * @return Gravatar
     *
     * @throws InvalidImageRatingException
     */
    public function setRating(string $rating): self
    {
        if (RatingHelper::isInvalid($rating)) {
            throw new InvalidImageRatingException($rating);
        }

        $this->rating = $rating;

        return $this;
    }

    /**
     * Set the maximum allowed rating for avatars.
     * TODO: add validation
     *
     * @param string $extension
     *
     * @return Gravatar
     */
    public function setExtension(string $extension): self
    {
        $this->ext = $extension;

        return $this;
    }

    /**
     * Get the avatar URL.
     *
     * @return string
     */
    public function getGravatarImageSrc(): string
    {
        $params = http_build_query([
            's' => $this->size,
            'd' => $this->default,
            'f' => $this->forceDefault ? 'y' : '',
            'r' => $this->rating,
        ]);

        return "{$this->baseUrl}/{$this->hash}{$this->ext}?{$params}";
    }

    /**
     * Get profile's data.
     *
     * @param bool $autoLoad
     *
     * @return GravatarProfile
     */
    public function getProfile($autoLoad = false): GravatarProfile
    {
        if ($this->profile instanceof GravatarProfile) {
            return $this->profile;
        }

        $this->profile = new GravatarProfile($this->email);

        if ($autoLoad) {
            $this->profile->loadProfile();
        }

        return $this->profile;
    }
}