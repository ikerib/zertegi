<?php

namespace App\Repository;

use App\Entity\Tablas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tablas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tablas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tablas[]    findAll()
 * @method Tablas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TablasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tablas::class);
    }

    // /**
    //  * @return Tablas[] Returns an array of Tablas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tablas
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}