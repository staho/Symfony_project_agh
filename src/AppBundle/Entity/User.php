<?php
/**
 * Created by PhpStorm.
 * User: staho
 * Date: 13.11.2017
 * Time: 21:07
 */
namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation", mappedBy="user")
     */
    private $reservations;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
