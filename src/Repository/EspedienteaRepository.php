<?php

namespace App\Repository;

use App\Entity\Espedientea;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Espedientea|null find($id, $lockMode = null, $lockVersion = null)
 * @method Espedientea|null findOneBy(array $criteria, array $orderBy = null)
 * @method Espedientea[]    findAll()
 * @method Espedientea[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EspedienteaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Espedientea::class);
    }

    // /**
    //  * @return Espedientea[] Returns an array of Espedientea objects
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
    public function findOneBySomeField($value): ?Espedientea
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
