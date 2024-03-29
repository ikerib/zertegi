<?php

namespace App\Repository;

use App\Entity\Obratxikiak;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Query\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Obratxikiak|null find($id, $lockMode = null, $lockVersion = null)
 * @method Obratxikiak|null findOneBy(array $criteria, array $orderBy = null)
 * @method Obratxikiak[]    findAll()
 * @method Obratxikiak[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObratxikiakRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Obratxikiak::class);
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
                $qb->orWhere($qb->expr()->like('a.' . $key, ':v' . $key . $miindex))->setParameter('v' . $key . $miindex, '%' . $v . '%');
                ++$miindex;
            }
        }

        return $qb->getQuery();
    }

    public function fullTextSearch($filter): \Doctrine\ORM\Query
    {
        $qb = $this->createQueryBuilder('a');
        $qb->andWhere('MATCH_AGAINST(a.espedientea, a.sailkapena, a.signatura) AGAINST (:searchterm boolean) > 0')
            ->setParameter('searchterm', $filter);

        return $qb->getQuery();
    }

}
