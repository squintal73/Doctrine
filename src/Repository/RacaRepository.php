<?php

namespace App\Repository;

use App\Entity\Raca;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class RacaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Raca::class);
    }

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('r')
            ->where('r.something = :value')->setParameter('value', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
}
