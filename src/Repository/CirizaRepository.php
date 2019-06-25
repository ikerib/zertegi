<?php

namespace App\Repository;

use App\Entity\Ciriza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ciriza|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ciriza|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ciriza[]    findAll()
 * @method Ciriza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CirizaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ciriza::class);
    }

    // /**
    //  * @return Ciriza[] Returns an array of Ciriza objects
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
    public function findOneBySomeField($value): ?Ciriza
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
