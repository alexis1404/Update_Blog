<?php

namespace BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 *
 * @ORM\Table(name="user_reg")
 * @ORM\Entity(repositoryClass="BlogBundle\Entity\UserRepository")
 * @UniqueEntity(fields="email", message="Email already taken")
 * @UniqueEntity(fields="username", message="Username already taken")
 *
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=60, unique=true)
     * @Assert\NotBlank()
     */
    private $username;


    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=70, unique=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     *
     */
    private $isActive;


    /**
     * @Assert\NotBlank()
     * @Assert\Length(max = 4096)
     */
    private $plainPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=70)
     */
    private $password;

    public function getId()
    {
        return $this->id;
    }


    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }


    public function getUsername()
    {
        return $this->username;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }


    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }


    public function getIsActive()
    {
        return $this->isActive;
    }


    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    public function __construct()
    {
        $this->isActive = true;
        $this->user_comments = new ArrayCollection();

    }

    public function getSalt()
    {
        return null;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,

        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            ) = unserialize($serialized);
    }

    /**
     * @ORM\OneToMany(targetEntity="BlogBundle\Entity\Comment", mappedBy="user")
     */
    protected $user_comments;


    /**
     * Add userComment
     *
     * @param \BlogBundle\Entity\Comment $userComment
     *
     * @return User
     */
    public function addUserComment(\BlogBundle\Entity\Comment $userComment)
    {
        $this->user_comments[] = $userComment;

        return $this;
    }

    /**
     * Remove userComment
     *
     * @param \BlogBundle\Entity\Comment $userComment
     */
    public function removeUserComment(\BlogBundle\Entity\Comment $userComment)
    {
        $this->user_comments->removeElement($userComment);
    }

    /**
     * Get userComments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUserComments()
    {
        return $this->user_comments;
    }
}
