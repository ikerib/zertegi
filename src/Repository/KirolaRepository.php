<?php

namespace App\Repository;

use App\Entity\Kirola;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kirola|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kirola|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kirola[]    findAll()
 * @method Kirola[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KirolaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kirola::class);
    }
}
