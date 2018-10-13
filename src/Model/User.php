<?php

namespace App\Model;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
    private $sub;
    private $username;
    private $nickname;
    private $name;
    private $picture;
    private $email;

    private $roles;

    public function __construct($jwt = [], array $roles = [])
    {
        $this->sub = $jwt['sub'] ?? '';
        $this->username = $jwt['email'] ?? ($jwt['sub'] ?? '');
        $this->nickname = $jwt['nickname'] ?? '';
        $this->name = $jwt['name'] ?? '';
        $this->picture = $jwt['picture'] ?? '';
        $this->email = $jwt['email'] ?? '';

        if (!empty($roles)) {
            $this->roles = $roles;
        } else {
            $this->roles = ['IS_AUTHENTICATED_ANONYMOUSLY'];
        }
    }

    public function getRoles()
    {
        return $this->roles;
    }

    public function getPassword()
    {
        return null;
    }

    public function getSalt()
    {
        return null;
    }

    /**
     * @return mixed
     */
    public function getSub()
    {
        return $this->sub;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function eraseCredentials()
    {
    }

    public function isEqualTo(UserInterface $user)
    {
        if (!$user instanceof User) {
            return false;
        }
        if ($this->getUsername() !== $user->getUsername()) {
            return false;
        }
        return true;
    }
}
