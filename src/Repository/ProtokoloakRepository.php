<?php

namespace App\Repository;

use App\Entity\Protokoloak;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Query\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Protokoloak|null find($id, $lockMode = null, $lockVersion = null)
 * @method Protokoloak|null findOneBy(array $criteria, array $orderBy = null)
 * @method Protokoloak[]    findAll()
 * @method Protokoloak[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProtokoloakRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Protokoloak::class);
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
        $qb->andWhere('MATCH_AGAINST(a.artxiboa, a.saila, a.eskribaua, a.data, a.laburpena, a.datuak, a.oharrak, a.bilatzaileak) AGAINST (:searchterm boolean) > 0')
            ->setParameter('searchterm',$filter);

        return $qb->getQuery();
    }
}
