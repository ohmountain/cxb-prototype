<?php

namespace Cxb\AppBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Cxb\AppBundle\Entity\Meta as MetaEntity;

class Meta
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param MetaEntity $meta
     *
     * @return MetaEntity $meta
     */
    public function makeVerify(MetaEntity $meta): MetaEntity
    {
        $meta->setVerify(true);

        return $this->update($meta);
    }

    /**
     * @param MetaEntity $meta
     *
     * @return MetaEntity $meta
     */
    public function makeUnverify(MetaEntity $meta): MetaEntity
    {
        $meta->setVerify(false);

        return $this->update($meta);
    }

    /**
     * @param MetaEntity $meta
     *
     * @return MetaEntity $meta
     */
    public function update(MetaEntity $meta): MetaEntity
    {
        $em = $this->container->get("doctrine")->getManager();
        $em->persist($meta);
        $em->flush();

        return $meta;
    }
}