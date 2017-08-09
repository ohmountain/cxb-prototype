<?php

namespace Cxb\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="Cxb\AppBundle\Repository\EventRepository")
 */
class Event
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
     * @var float
     *
     * @ORM\Column(name="score", type="float", options={"comment":"此次事件的评分"})
     */
    private $score;

    /**
     * @var int
     *
     * @ORM\Column(name="time", type="integer", options={"comment":"时间戳"})
     */
    private $time;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", unique=true, options={"comment":"token"})
     */
    private $token;

    /**
     * @var Department
     *
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="events")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     */
    private $department;

    /**
     * @var Person
     *
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="events")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="id")
     */
    private $person;

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
     * Set score
     *
     * @param float $score
     *
     * @return Event
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set time
     *
     * @param integer $time
     *
     * @return Event
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Event
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
     * Set department
     *
     * @param \Cxb\AppBundle\Entity\Department $department
     *
     * @return Event
     */
    public function setDepartment(\Cxb\AppBundle\Entity\Department $department = null)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return \Cxb\AppBundle\Entity\Department
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set person
     *
     * @param \Cxb\AppBundle\Entity\Person $person
     *
     * @return Event
     */
    public function setPerson(\Cxb\AppBundle\Entity\Person $person = null)
    {
        $this->person = $person;

        return $this;
    }

    /**
     * Get person
     *
     * @return \Cxb\AppBundle\Entity\Person
     */
    public function getPerson()
    {
        return $this->person;
    }
}
