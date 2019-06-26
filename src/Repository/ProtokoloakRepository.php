<?php

namespace App\Repository;

use App\Entity\Protokoloak;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Protokoloak|null find($id, $lockMode = null, $lockVersion = null)
 * @method Protokoloak|null findOneBy(array $criteria, array $orderBy = null)
 * @method Protokoloak[]    findAll()
 * @method Protokoloak[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProtokoloakRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Protokoloak::class);
    }

    // /**
    //  * @return Protokoloak[] Returns an array of Protokoloak objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Protokoloak
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
