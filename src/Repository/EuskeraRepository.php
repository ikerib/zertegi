<?php

namespace App\Repository;

use App\Entity\Euskera;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Euskera|null find($id, $lockMode = null, $lockVersion = null)
 * @method Euskera|null findOneBy(array $criteria, array $orderBy = null)
 * @method Euskera[]    findAll()
 * @method Euskera[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EuskeraRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Euskera::class);
    }

    // /**
    //  * @return Euskera[] Returns an array of Euskera objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Euskera
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
