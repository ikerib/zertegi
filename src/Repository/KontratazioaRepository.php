<?php

namespace App\Repository;

use App\Entity\Kontratazioa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kontratazioa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kontratazioa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kontratazioa[]    findAll()
 * @method Kontratazioa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KontratazioaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kontratazioa::class);
    }

    // /**
    //  * @return Kontratazioa[] Returns an array of Kontratazioa objects
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
    public function findOneBySomeField($value): ?Kontratazioa
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
