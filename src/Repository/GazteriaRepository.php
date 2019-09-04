<?php

namespace App\Repository;

use App\Entity\Gazteria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Gazteria|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gazteria|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gazteria[]    findAll()
 * @method Gazteria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GazteriaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gazteria::class);
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
