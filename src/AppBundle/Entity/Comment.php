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

/**
 * Class Comment
 * @package AppBundle\Entity
 * @ORM\Entity
 * @ORM\ChangeTrackingPolicy("DEFERRED_EXPLICIT")
 */
class Comment extends BaseComment
{
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