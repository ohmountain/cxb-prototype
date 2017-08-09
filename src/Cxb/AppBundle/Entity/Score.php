<?php

namespace Cxb\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Score
 *
 * @ORM\Table(name="score")
 * @ORM\Entity(repositoryClass="Cxb\AppBundle\Repository\ScoreRepository")
 */
class Score
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
     * @ORM\Column(name="score", type="float", options={"comment":"分数"})
     */
    private $score;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="smallint", options={"comment":"评分年份"})
     */
    private $year;

    /**
     * @var int
     *
     * @ORM\Column(name="month", type="smallint", options={"comment":"评分月份"})
     */
    private $month;

    /**
     * @var int
     *
     * @ORM\Column(name="day", type="smallint", options={"comment":"评分天数"})
     */
    private $day;

    /**
     * @var integer
     *
     * @ORM\Column(name="time", type="integer", options={"comment": "unix时间戳"})
     */
    private $time;

    /**
     * @var Person
     *
     * @ORM\ManyToOne(targetEntity="Person", inversedBy="scores")
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
     * @return Score
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
     * Set year
     *
     * @param integer $year
     *
     * @return Score
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set month
     *
     * @param integer $month
     *
     * @return Score
     */
    public function setMonth($month)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * Get month
     *
     * @return int
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set day
     *
     * @param integer $day
     *
     * @return Score
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return int
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set time
     *
     * @param \DateTime $time
     *
     * @return Score
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set person
     *
     * @param \Cxb\AppBundle\Entity\Person $person
     *
     * @return Score
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
