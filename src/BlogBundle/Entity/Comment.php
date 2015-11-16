<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="BlogBundle\Entity\CommentRepository")
 */
class Comment
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
     * @ORM\Column(name="authorComment", type="string", length=50)
     */
    private $authorComment;

    /**
     * @var string
     *
     * @ORM\Column(name="textComment", type="text")
     */
    private $textComment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateComment", type="date")
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
}

