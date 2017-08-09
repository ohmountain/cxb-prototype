<?php

namespace Cxb\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Meta
 *
 * @ORM\Table(name="meta", indexes={@ORM\Index(name="meta_token_index", columns={"token"})})
 * @ORM\Entity(repositoryClass="Cxb\AppBundle\Repository\MetaRepository")
 */
class Meta
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
     * @var int
     *
     * @ORM\Column(name="type", type="smallint", options={"comment":"评分类型,0为自然人,2为企业"})
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, options={"comment":"信息标题"})
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, options={"comment":"信息描述"})
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="remark", type="string", length=255, options={"comment":"额外描述"})
     */
    private $remark;

    /**
     * @var bool
     *
     * @ORM\Column(name="verify", type="boolean", options={"comment":"是否经过诚信办认证"})
     */
    private $verify;

    /**
     * @var float
     *
     * @ORM\Column(name="minimum_score", type="float", options={"comment":"最高扣分"})
     */
    private $minimumScore;

    /**
     * @var float
     *
     * @ORM\Column(name="maximum_score", type="float", options={"comment":"最高加分"})
     */
    private $maximumScore;

    /**
     * @var string
     *
     * @ORM\Column(name="token", type="string", length=32, unique=true, options={"comment":"token,诚信办和部门同步数据用"})
     */
    private $token;

    /**
     * @var Department
     *
     * @ORM\ManyToOne(targetEntity="Department", inversedBy="metas")
     * @ORM\JoinColumn(name="department_id", referencedColumnName="id")
     */
    private $department;


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
     * Set type
     *
     * @param integer $type
     *
     * @return Meta
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Meta
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
     * Set description
     *
     * @param string $description
     *
     * @return Meta
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
     * Set remark
     *
     * @param string $remark
     *
     * @return Meta
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * Get remark
     *
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set verify
     *
     * @param boolean $verify
     *
     * @return Meta
     */
    public function setVerify($verify)
    {
        $this->verify = $verify;

        return $this;
    }

    /**
     * Get verify
     *
     * @return bool
     */
    public function getVerify()
    {
        return $this->verify;
    }

    /**
     * Set maximumScore
     *
     * @param float $maximumScore
     *
     * @return Meta
     */
    public function setMaximumScore($maximumScore)
    {
        $this->maximumScore = $maximumScore;

        return $this;
    }

    /**
     * Get maximumScore
     *
     * @return float
     */
    public function getMaximumScore()
    {
        return $this->maximumScore;
    }

    /**
     * Set token
     *
     * @param string $token
     *
     * @return Meta
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
     * @return Meta
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
     * Set minimumScore
     *
     * @param float $minimumScore
     *
     * @return Meta
     */
    public function setMinimumScore($minimumScore)
    {
        $this->minimumScore = $minimumScore;

        return $this;
    }

    /**
     * Get minimumScore
     *
     * @return float
     */
    public function getMinimumScore()
    {
        return $this->minimumScore;
    }
}
