<?php

namespace App\Repository;

use App\Entity\Animal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class AnimalRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Animal::class);
    }

    public function qtsPorRaca()
    {
        $q = $this->createQueryBuilder("a")
            ->select(["count(a) as qtde", "r.nome"])
            ->innerJoin("a.raca", "r")
            ->groupBy("r.nome")
            ->getQuery();

        return $q->getResult();
    }
}
