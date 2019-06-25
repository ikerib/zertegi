<?php

namespace App\Repository;

use App\Entity\Hutsak;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Hutsak|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hutsak|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hutsak[]    findAll()
 * @method Hutsak[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HutsakRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Hutsak::class);
    }

    // /**
    //  * @return Hutsak[] Returns an array of Hutsak objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hutsak
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
