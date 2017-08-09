<?php

namespace Cxb\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Department
 *
 * @ORM\Table(name="department", indexes={@ORM\Index(name="department_token_index", columns={"token"})})
 * @ORM\Entity(repositoryClass="Cxb\AppBundle\Repository\DepartmentRepository")
 */
class Department
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
     * @ORM\Column(name="title", type="string", length=255, options={"comment":"部门名称"})
     */
    private $title;

    /**
     * @var float
     *
     * @ORM\Column(name="weights", type="float", options={"comment":"权重"})
     */
    private $weights;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=32, unique=true, options={"comment":"token,api认证用"})
     */
    private $token;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Meta", mappedBy="department")
     */
    private $metas;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="Event", mappedBy="department")
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
     * Set title
     *
     * @param string $title
     *
     * @return Department
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
     * Set weights
     *
     * @param float $weights
     *
     * @return Department
     */
    public function setWeights($weights)
    {
        $this->weights = $weights;

        return $this;
    }

    /**
     * Get weights
     *
     * @return float
     */
    public function getWeights()
    {
        return $this->weights;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Department
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
        $this->metas = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add meta
     *
     * @param \Cxb\AppBundle\Entity\Meta $meta
     *
     * @return Department
     */
    public function addMeta(\Cxb\AppBundle\Entity\Meta $meta)
    {
        $this->metas[] = $meta;

        return $this;
    }

    /**
     * Remove meta
     *
     * @param \Cxb\AppBundle\Entity\Meta $meta
     */
    public function removeMeta(\Cxb\AppBundle\Entity\Meta $meta)
    {
        $this->metas->removeElement($meta);
    }

    /**
     * Get metas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMetas()
    {
        return $this->metas;
    }

    /**
     * Add event
     *
     * @param \Cxb\AppBundle\Entity\Event $event
     *
     * @return Department
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
