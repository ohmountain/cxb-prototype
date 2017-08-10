<?php

namespace Cxb\AppBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Cxb\AppBundle\Entity\Department as DepartmentEntity;

class Department
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $title
     * @param float $weights
     * @param string $token
     *
     * @return DepartmentEntity $department
     */
    public function create(string $title, float $weights, string $token): DepartmentEntity
    {
        $em = $this->container->get('doctrine')->getManager();

        $department = new DepartmentEntity();
        $department->setTitle($title);
        $department->setWeights($weights);
        $department->setToken($token);

        $em->persist($department);
        $em->flush();

        return $department;
    }

    /**
     * @param integer $id
     *
     * @return DepartmentEntity
     */
    public function get(int $id): DepartmentEntity
    {
        $rep = $this->container->get("doctrine")->getRepository("Cxb\AppBundle\Entity\Department");

        $department = $rep->find($id);

        if ($department === null) {
            $department = new DepartmentEntity();
        }

        return $department;
    }

    /**
     * @param DepartmentEntity $department
     *
     * @return Department $department
     */
    public function update(DepartmentEntity $department): DepartmentEntity
    {
        $em = $this->container->get("container")->getManager();

        $em->persist($department);
        $em->flush();

        return $department;
    }

    /**
     * @param string $token
     *
     * @return DepartmentEntity $department
     */
    public function getByToken(string $token): DepartmentEntity
    {
        $rep = $this->container->get("doctrine")->getRepository("Cxb\AppBundle\Entity\Department");

        $department = $rep->findBy(["token" => $token]);

        if (count($department) === 0) {
            $department = [new DepartmentEntity()];
        }

        return $department[0];
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->container->get("doctrine")->getRepository("Cxb\AppBundle\Entity\Department")->findAll();
    }

    /**
     * @param array $where
     *
     * @return array
     */
    public function find(array $where): array
    {
        return $this->container->get("doctrine")->getRepository("Cxb\AppBundle\Entity\Department")->findBy($where);
    }

    /**
     * @param array $where
     *
     * @return array
     */
    public function findByTitle(string $title): array
    {
        return $this->find(["title" => $title]);
    }

    /**
     * @param array $where
     *
     * @return array
     */
    public function findByWeights(float $weights): array
    {
        return $this->find(["weights" => $weights]);
    }
}


