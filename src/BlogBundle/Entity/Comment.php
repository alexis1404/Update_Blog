<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BlogBundle\Entity\CommentRepository")
 *@JMS\ExclusionPolicy("all")
 */
class Comment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @JMS\Expose
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="authorComment", type="string", length=50)
     *
     * @JMS\Expose
     */
    private $authorComment;

    /**
     * @var string
     *
     * @ORM\Column(name="textComment", type="text")
     *
     * @JMS\Expose
     */
    private $textComment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateComment", type="date")
     *
     * @JMS\Expose
     */
    private $dateComment;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set authorComment
     *
     * @param string $authorComment
     *
     * @return Comment
     */
    public function setAuthorComment($authorComment)
    {
        $this->authorComment = $authorComment;

        return $this;
    }

    /**
     * Get authorComment
     *
     * @return string
     */
    public function getAuthorComment()
    {
        return $this->authorComment;
    }

    /**
     * Set textComment
     *
     * @param string $textComment
     *
     * @return Comment
     */
    public function setTextComment($textComment)
    {
        $this->textComment = $textComment;

        return $this;
    }

    /**
     * Get textComment
     *
     * @return string
     */
    public function getTextComment()
    {
        return $this->textComment;
    }

    /**
     * Set dateComment
     *
     * @param \DateTime $dateComment
     *
     * @return Comment
     */
    public function setDateComment($dateComment)
    {
        $this->dateComment = $dateComment;

        return $this;
    }

    /**
     * Get dateComment
     *
     * @return \DateTime
     */
    public function getDateComment()
    {
        return $this->dateComment;
    }

    /**
     * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\Post", inversedBy="comments" )
     * @ORM\JoinColumn(name="target_post", referencedColumnName="id" )
     */
    protected $inPost;

    /**
     * Set inPost
     *
     * @param \BlogBundle\Entity\Post $inPost
     *
     * @return Comment
     */
    public function setInPost(\BlogBundle\Entity\Post $inPost = null)
    {
        $this->inPost = $inPost;

        return $this;
    }

    /**
     * Get inPost
     *
     * @return \BlogBundle\Entity\Post
     */
    public function getInPost()
    {
        return $this->inPost;
    }

    /**
     * @ORM\ManyToOne(targetEntity="BlogBundle\Entity\User", inversedBy="user_comments")
     * @ORM\JoinColumn(name="target_user", referencedColumnName="id")
     */
    protected $user;

    /**
     * Set user
     *
     * @param \BlogBundle\Entity\User $user
     *
     * @return Comment
     */
    public function setUser(\BlogBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \BlogBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
