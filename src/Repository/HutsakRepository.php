<?php

namespace App\Repository;

use App\Entity\Hutsak;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Hutsak|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hutsak|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hutsak[]    findAll()
 * @method Hutsak[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HutsakRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Hutsak::class);
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

    public function fullTextSearch($filter): \Doctrine\ORM\QueryBuilder
    {
        $qb = $this->createQueryBuilder( 'a');
        $qb->andWhere('MATCH_AGAINST(a.zaharra, a.berria) AGAINST (:searchterm boolean) > 0')
            ->setParameter('searchterm',$filter);

        return $qb;
    }
}
