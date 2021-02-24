<?php

namespace App\Repository;

use App\Entity\Euskera;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Euskera|null find($id, $lockMode = null, $lockVersion = null)
 * @method Euskera|null findOneBy(array $criteria, array $orderBy = null)
 * @method Euskera[]    findAll()
 * @method Euskera[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EuskeraRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Euskera::class);
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
