<?php

namespace Potogan\TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Misd\PhoneNumberBundle\Validator\Constraints as MisdAssert;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_conference")
 * @ORM\Entity()
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 */
class UserConference
{
    /**
     * Identifiant
     *
     * @var integer $id
     *
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Pseudonyme d'utilisateur
     *
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     * @Assert\NotBlank()
     */
    protected $username;

    /**
     * Prénom d'utilisateur
     *
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    protected $firstname;

    /**
     * Nom d'utilisateur
     *
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    protected $lastname;

    /**
     * Numéro de mobile
     *
     * @var string
     *
     * @Assert\Length(min = 8, max = 20)
     * @Assert\NotBlank()
     * @MisdAssert\PhoneNumber()
     * @ORM\Column(name="mobile", type="string", length=255)
     */
    protected $mobile;

    /**
     * Email d'utilisateur
     *
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     * @Assert\NotBlank()
     */
    protected $email;

    /**
     * URL Twitter d'utilisateur
     *
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     */
    protected $twitter;

    /**
     * URL Twitter d'utilisateur
     *
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     */
    protected $facebook;

    /**
     * @ORM\Column(name="avatar", type="string", nullable=true)
     * @Assert\Image(
     *     maxWidth = 420,
     *     maxHeight = 420
     * )
     */
    private $avatar;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return UserConference $this
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * @return UserConference $this
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return UserConference $this
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param string $mobile
     * @return UserConference $this
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return UserConference $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * @param string $twitter
     * @return UserConference $this
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * @return string
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param string $facebook
     * @return UserConference $this
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     * @return UserConference $this
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }
}
