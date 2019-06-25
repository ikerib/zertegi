<?php

namespace App\Repository;

use App\Entity\Kultura;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kultura|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kultura|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kultura[]    findAll()
 * @method Kultura[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KulturaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kultura::class);
    }

    // /**
    //  * @return Kultura[] Returns an array of Kultura objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kultura
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
