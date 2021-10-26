<?php

namespace App\Repository;

use App\Entity\Kirola;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Kirola|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kirola|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kirola[]    findAll()
 * @method Kirola[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KirolaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kirola::class);
    }

    public function getAllBerrikusi(): \Doctrine\ORM\Query
    {
        $qb = $this->createQueryBuilder('a');
        $qb->andWhere('a.berrikusi = 1');
        return $qb->getQuery();
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
        $qb->andWhere('MATCH_AGAINST(a.espedientea, a.data, a.sailkapena, a.signatura, a.oharrak) AGAINST (:searchterm boolean) > 0')
            ->setParameter('searchterm',$filter);

        return $qb->getQuery();
    }
}
