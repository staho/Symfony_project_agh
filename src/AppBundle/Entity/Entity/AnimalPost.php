<?php

namespace AppBundle\Entity\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AnimalPost
 *
 * @ORM\Table(name="entity_animal_post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Entity\AnimalPostRepository")
 */
class AnimalPost
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
     * @ORM\Column(name="picture", type="string", length=255)
     */
    private $picture;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="castration", type="boolean")
     */
    private $castration;

    /**
     * @var bool
     *
     * @ORM\Column(name="vaccination", type="boolean")
     */
    private $vaccination;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reservation", mappedBy="animalPost")
     */
    private $reservations;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return AnimalPost
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
    * @return string
    */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     *
     * @return AnimalPost
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }


    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return AnimalPost
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set castration
     *
     * @param boolean $castration
     *
     * @return AnimalPost
     */
    public function setCastration($castration)
    {
        $this->castration = $castration;

        return $this;
    }

    /**
     * Get castration
     *
     * @return bool
     */
    public function getCastration()
    {
        return $this->castration;
    }

    /**
     * Set vaccination
     *
     * @param boolean $vaccination
     *
     * @return AnimalPost
     */
    public function setVaccination($vaccination)
    {
        $this->vaccination = $vaccination;

        return $this;
    }

    /**
     * Get vaccination
     *
     * @return bool
     */
    public function getVaccination()
    {
        return $this->vaccination;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return AnimalPost
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }


}

