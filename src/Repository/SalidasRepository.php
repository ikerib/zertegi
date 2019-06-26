<?php

namespace App\Repository;

use App\Entity\Salidas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Salidas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Salidas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Salidas[]    findAll()
 * @method Salidas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalidasRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Salidas::class);
    }

    // /**
    //  * @return Salidas[] Returns an array of Salidas objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Salidas
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
