<?php

namespace App\Repository;

use App\Entity\Liburuxka;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Liburuxka|null find($id, $lockMode = null, $lockVersion = null)
 * @method Liburuxka|null findOneBy(array $criteria, array $orderBy = null)
 * @method Liburuxka[]    findAll()
 * @method Liburuxka[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LiburuxkaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Liburuxka::class);
    }

    // /**
    //  * @return Liburuxka[] Returns an array of Liburuxka objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Liburuxka
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
