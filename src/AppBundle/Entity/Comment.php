<?php
/**
 * Created by PhpStorm.
 * User: staho
 * Date: 06.11.2017
 * Time: 18:19
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \FOS\CommentBundle\Entity\Comment as BaseComment;
use FOS\CommentBundle\Model\SignedCommentInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class Comment
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Comment extends BaseComment implements SignedCommentInterface
{
    /**
     * Author of the comment
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @var User
    */
    protected $author;

    public function setAuthor(UserInterface $author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getAuthorName()
    {
        if (null === $this->getAuthor()) {
            return 'Anonymous';
        }

        return $this->getAuthor()->getUsername();
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     */
    protected $id;
    /**
     * Thread of this comment
     * @var Thread
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Thread")
     */
    protected $thread;

}