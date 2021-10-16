<?php

namespace Andriymiz\Gravatar;

use Andriymiz\Gravatar\Exceptions\InvalidEmailException;
use Andriymiz\Gravatar\Exceptions\InvalidUrlException;
use Andriymiz\Gravatar\Helpers\EmailHelper;
use Andriymiz\Gravatar\Helpers\UrlHelper;

class GravatarProfile
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $baseUrl = 'https://www.gravatar.com';

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var string
     */
    private $requestHash;

    /**
     * @var string
     */
    private $profileUrl;

    /**
     * @var string
     */
    private $preferredUsername;

    /**
     * @var string
     */
    private $thumbnailUrl;

    /**
     * @var array
     */
    private $photos;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $displayName;

    /**
     * Make a Gravatar instance.
     *
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->setEmail($email);
    }

    public function __toString()
    {
        return (string) $this->email;
    }

    /**
     * Set user email.
     *
     * @param string $email
     *
     * @return GravatarProfile
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
     * @return GravatarProfile
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
     * Load profile's data from Gravatar.
     *
     * @return GravatarProfile
     */
    public function loadProfile(): GravatarProfile
    {
        $content = file_get_contents("{$this->baseUrl}/{$this->hash}.php");
        $profile = unserialize($content);
        if (is_array($profile) && isset($profile['entry'])) {
            $entry = $profile['entry'][0];

            $this->id = $entry['id'];
            $this->requestHash = $entry['requestHash'];
            $this->profileUrl = $entry['profileUrl'];
            $this->preferredUsername = $entry['preferredUsername'];
            $this->thumbnailUrl = $entry['thumbnailUrl'];
            $this->photos = $entry['photos'];
            $this->name = $entry['name'];
            $this->displayName = $entry['displayName'];
        }

        return $this;
    }
}