<?php

namespace App\Repository;

use App\Entity\Cliente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use PDO;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ClienteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Cliente::class);
    }

    public function qtsAnimaisPorCliente()
    {
        $sql = "select COUNT(ac.animal_id) as qtde,
                c.nome FROM animal_cliente ac INNER JOIN 
                cliente c ON c.id = ac.cliente_id
                GROUP BY c.nome
        ";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)
            ->fetchAll(PDO::FETCH_OBJ);
    }

}
