<?php

namespace App\Repository;

use App\Entity\Kultura;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kultura|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kultura|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kultura[]    findAll()
 * @method Kultura[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KulturaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kultura::class);
    }

    public function getQueryByFinder($arr): \Doctrine\ORM\Query
    {
        $qb = $this->createQueryBuilder('a');
        foreach ($arr as $key => $value) {
            $miindex = 0;
            foreach ($value as $v) {
                $qb->orWhere($qb->expr()->like('a.'.$key, ':v'.$key.$miindex))->setParameter('v'.$key.$miindex, '%'.$v.'%');
                ++$miindex;
            }
        }

        return $qb->getQuery();
    }
}
