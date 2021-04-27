<?php

namespace App\Repository;

use App\Entity\Gazteria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Gazteria|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gazteria|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gazteria[]    findAll()
 * @method Gazteria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GazteriaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gazteria::class);
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

    public function fullTextSearch($filter): \Doctrine\ORM\QueryBuilder
    {
        $qb = $this->createQueryBuilder( 'a');
        $qb->andWhere('MATCH_AGAINST(a.espedientea, a.data, a.sailkapena, a.oharrak) AGAINST (:searchterm boolean) > 0')
            ->setParameter('searchterm',$filter);

        return $qb;
    }
}
