<?php

namespace Cxb\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 *
 * @ORM\Table(name="person", indexes={@ORM\Index(name="user_token_index", columns={"token"})})
 * @ORM\Entity(repositoryClass="Cxb\AppBundle\Repository\PersonRepository")
 */
class Person
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
     * @ORM\Column(name="name", type="string", length=255, options={"comment":"姓名"})
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="sex", type="integer", length=1, nullable=false, options={"comment":"性别，0男1女"})
     */
    private $sex;

    /**
     * @var string
     *
     * @ORM\Column(name="id_number", type="string", length=18, unique=true, options={"comment":"身份证号"})
     */
    private $idNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, options={"comment":"地址"})
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=32, unique=true, options={"comment":"token，用于更新这条记录"})
     */
    private $token;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Person", mappedBy="person")
     */
    private $scores;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Event", mappedBy="person")
     */
    private $events;


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
     * Set name
     *
     * @param string $name
     *
     * @return Person
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set sex
     *
     * @param integer $sex
     *
     * @return Person
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return bool
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set idNumber
     *
     * @param string $idNumber
     *
     * @return Person
     */
    public function setIdNumber($idNumber)
    {
        $this->idNumber = $idNumber;

        return $this;
    }

    /**
     * Get idNumber
     *
     * @return string
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return Person
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Person
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->scores = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add score
     *
     * @param \Cxb\AppBundle\Entity\Person $score
     *
     * @return Person
     */
    public function addScore(\Cxb\AppBundle\Entity\Person $score)
    {
        $this->scores[] = $score;

        return $this;
    }

    /**
     * Remove score
     *
     * @param \Cxb\AppBundle\Entity\Person $score
     */
    public function removeScore(\Cxb\AppBundle\Entity\Person $score)
    {
        $this->scores->removeElement($score);
    }

    /**
     * Get scores
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getScores()
    {
        return $this->scores;
    }

    /**
     * Add event
     *
     * @param \Cxb\AppBundle\Entity\Event $event
     *
     * @return Person
     */
    public function addEvent(\Cxb\AppBundle\Entity\Event $event)
    {
        $this->events[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \Cxb\AppBundle\Entity\Event $event
     */
    public function removeEvent(\Cxb\AppBundle\Entity\Event $event)
    {
        $this->events->removeElement($event);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents()
    {
        return $this->events;
    }
}
