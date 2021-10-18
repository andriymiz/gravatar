<?php

namespace Andriymiz\Gravatar;

use Andriymiz\Gravatar\Exceptions\InvalidEmailException;
use Andriymiz\Gravatar\Exceptions\InvalidUrlException;
use Andriymiz\Gravatar\Helpers\EmailHelper;
use Andriymiz\Gravatar\Helpers\UrlHelper;
use ArrayAccess;

class GravatarProfile implements ArrayAccess
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


    public function offsetGet($offset)
    {
        switch ($offset) {
            case 'email': return $this->email;
            case 'id': return $this->id;
            case 'hash': return $this->hash;
            case 'requestHash': return $this->requestHash;
            case 'profileUrl': return $this->profileUrl;
            case 'preferredUsername': return $this->preferredUsername;
            case 'thumbnailUrl': return $this->thumbnailUrl;
            case 'photos': return $this->photos;
            case 'name': return $this->name;
            case 'displayName': return $this->displayName;
            default: return null;
        }
    }

    public function offsetSet($offset, $value)
    {
        // Nothing
    }

    public function offsetExists($offset) 
    {
        return in_array($offset, [
            'email',
            'id',
            'hash',
            'requestHash',
            'profileUrl',
            'preferredUsername',
            'thumbnailUrl',
            'photos',
            'name',
            'displayName',
        ]);
    }
    
    public function offsetUnset($offset) 
    {
        // Nothing
    }
}
