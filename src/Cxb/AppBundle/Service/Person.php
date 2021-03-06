<?php

namespace Cxb\AppBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Cxb\AppBundle\Entity\Person as PersonEntity;

class Person
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $name
     * @param integer $sex
     * @param string $id_number
     * @param string $address
     * @param string $token
     *
     * @return PersonEntity $person
     */
    public function create(string $name, int $sex, string $id_number, string $address, string $token): PersonEntity
    {
        $person = $this->getByIdNumber($id_number);

        if ($person->getId() !== null) {
            return $person;
        }

        $person->setName($name);
        $person->setSex($sex);
        $person->setIdNumber($id_number);
        $person->setAddress($address);
        $person->setToken($token);

        $em = $this->container->get("doctrine")->getManager();

        $em->persist($person);
        $em->flush();

        return $person;
    }

    /**
     * @return PersonEntity
     */
    public function createEmpty(): PersonEntity
    {
        return (new PersonEntity());
    }

    /**
     * @param array $where
     *
     * @return array
     */
    public function find(array $where): array
    {
        $rep = $this->container->get("doctrine")->getRepository("Cxb\AppBundle\Entity\Person");

        return $rep->findBy($where);
    }

    /**
     * @param array $id
     *
     * @return PersonEntity
     */
    public function get(int $id): PersonEntity
    {
        $rep = $this->container->get("doctrine")->getRepository("Cxb\AppBundle\Entity\Person");

        $person = $rep->find($id);

        if ($person === null) {
            $person = new PersonEntity();
        }

        return $person;
    }

    /**
     * @param string $id_number
     *
     * @return PersonEntity $person
     */
    public function getByIdNumber(string $id_number): PersonEntity
    {
        $persons = $this->find(["idNumber" => $id_number]);

        if (count($persons) === 0) {
            array_push($persons, new PersonEntity());
        }

        return $persons[0];
    }

    /**
     * @param string $name
     *
     * return array
     */
    public function findByName(string $name): array
    {
        return $this->find(["name" => $name]);
    }

    /**
     * @param string $token
     *
     * @return PersonEntity $person
     */
    public function getByToken(string $token)
    {
        $persons = $this->find(["token" => $token]);

        if (count($persons) === 0) {
            array_push($persons, new PersonEntity());
        }

        return $persons[0];
    }

    /**
     * @param int $page
     * @param int $count
     *
     * @return array
     */
    public function pagination(int $page, int $count): \stdClass
    {
        return $this->container
            ->get("doctrine")
            ->getManager()
            ->getRepository(PersonEntity::class)
            ->pagination($page, $count);
    }
}