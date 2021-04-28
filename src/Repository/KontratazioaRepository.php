<?php

namespace App\Repository;

use App\Entity\Kontratazioa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Kontratazioa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kontratazioa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kontratazioa[]    findAll()
 * @method Kontratazioa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KontratazioaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kontratazioa::class);
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

    public function fullTextSearch($filter): \Doctrine\ORM\Query
    {
        $qb = $this->createQueryBuilder( 'a');
        $qb->andWhere('MATCH_AGAINST(a.espedientea, a.sailkapena, a.signatura) AGAINST (:searchterm boolean) > 0')
            ->setParameter('searchterm',$filter);

        return $qb->getQuery();
    }

    public function fieldFullTextSearch($field, $filter): \Doctrine\ORM\Query
    {
        $qb = $this->createQueryBuilder( 'a');
        $qb->andWhere("MATCH_AGAINST(a.$field) AGAINST (:searchterm boolean) > 0")
            ->setParameter('searchterm',$filter);

        return $qb->getQuery();
    }
}
