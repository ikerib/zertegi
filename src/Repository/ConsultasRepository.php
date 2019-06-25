<?php

namespace App\Repository;

use App\Entity\Consultas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Consultas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Consultas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Consultas[]    findAll()
 * @method Consultas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsultasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Consultas::class);
    }

    // /**
    //  * @return Consultas[] Returns an array of Consultas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Consultas
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
