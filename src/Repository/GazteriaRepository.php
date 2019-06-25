<?php

namespace App\Repository;

use App\Entity\Gazteria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Gazteria|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gazteria|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gazteria[]    findAll()
 * @method Gazteria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GazteriaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gazteria::class);
    }

    // /**
    //  * @return Gazteria[] Returns an array of Gazteria objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gazteria
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
