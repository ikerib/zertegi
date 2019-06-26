<?php

namespace App\Repository;

use App\Entity\Pendientes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Pendientes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pendientes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pendientes[]    findAll()
 * @method Pendientes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PendientesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pendientes::class);
    }

    // /**
    //  * @return Pendientes[] Returns an array of Pendientes objects
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
    public function findOneBySomeField($value): ?Pendientes
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
