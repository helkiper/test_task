<?php

namespace Helkiper\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="Helkiper\BlogBundle\Repository\CommentRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Comment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=30)
     * @Assert\NotBlank()
     * @Assert\Regex(pattern="/[А-ЯA-Z][а-яa-z]+\s[А-ЯA-Z][а-яa-z]+/")
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     * @Assert\NotBlank()
     */
    private $content;

    /**
     * @var datetime_immutable
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

	/**
	 * @ORM\ManyToOne(targetEntity="Post", inversedBy="comments")
	 * @ORM\JoinColumn(name="post_id", referencedColumnName="id", onDelete="CASCADE")
	 */
    private $post;

	/**
	 * @ORM\ManyToOne(targetEntity="Category", inversedBy="comments")
	 * @ORM\JoinColumn(name="category_id", referencedColumnName="id", onDelete="CASCADE")
	 */
    private $category;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set author.
     *
     * @param string $author
     *
     * @return Comment
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author.
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set content.
     *
     * @param string $content
     *
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt.
     *
     * @param datetime $createdAt
     *
     * @return Comment
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return datetime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set post.
     *
     * @param \Helkiper\BlogBundle\Entity\Post $post
     *
     * @return Comment
     */
    public function setPost(\Helkiper\BlogBundle\Entity\Post $post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post.
     *
     * @return \Helkiper\BlogBundle\Entity\Post
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set category.
     *
     * @param \Helkiper\BlogBundle\Entity\Category $category
     *
     * @return Comment
     */
    public function setCategory(\Helkiper\BlogBundle\Entity\Category $category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category.
     *
     * @return \Helkiper\BlogBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

	/**
	 * @ORM\PrePersist()
	 */
    public function setCreatedAtValue(){
    	$this->setCreatedAt(new \DateTime());
    }
}
