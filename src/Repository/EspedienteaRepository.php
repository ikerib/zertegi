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

    public function getQueryByFinder($arr): \Doctrine\ORM\Query
    {
        $qb = $this->createQueryBuilder('a');

        foreach ($arr as $key=>$value) {
            foreach ($value as $v) {
                $qb->orWhere(
                    $qb->expr()->like('a.'.$key,':v'.$key)
                )->setParameter('v'.$key,'%'.$v.'%');
            }
        }

        return $qb->getQuery();

    }
}
