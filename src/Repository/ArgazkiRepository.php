<?php

namespace App\Repository;

use App\Entity\Argazki;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Argazki|null find($id, $lockMode = null, $lockVersion = null)
 * @method Argazki|null findOneBy(array $criteria, array $orderBy = null)
 * @method Argazki[]    findAll()
 * @method Argazki[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArgazkiRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Argazki::class);
    }

    // /**
    //  * @return Argazki[] Returns an array of Argazki objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Argazki
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
