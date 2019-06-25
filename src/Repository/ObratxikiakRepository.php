<?php

namespace App\Repository;

use App\Entity\Obratxikiak;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Obratxikiak|null find($id, $lockMode = null, $lockVersion = null)
 * @method Obratxikiak|null findOneBy(array $criteria, array $orderBy = null)
 * @method Obratxikiak[]    findAll()
 * @method Obratxikiak[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObratxikiakRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Obratxikiak::class);
    }

    // /**
    //  * @return Obratxikiak[] Returns an array of Obratxikiak objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Obratxikiak
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
