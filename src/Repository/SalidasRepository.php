<?php

namespace App\Repository;

use App\Entity\Salidas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Query\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Salidas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Salidas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Salidas[]    findAll()
 * @method Salidas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalidasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Salidas::class);
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
        $qb->andWhere('MATCH_AGAINST( a.espedientea, a.signatura, a.eskatzailea, a.irteera, a.sarrera) AGAINST (:searchterm boolean) > 0')
            ->setParameter('searchterm',$filter);

        return $qb->getQuery();
    }

    public function fieldFullTextSearch($query): \Doctrine\ORM\Query
    {
        $qb = $this->createQueryBuilder('a');
        $andStatements = $qb->expr()->andX();
        foreach ($query as $key=>$value) {
            foreach ($value as $i => $iValue) {
                $andStatements->add(
                    $qb->expr()->like("a.$key", $qb->expr()->literal('%' . $iValue . '%'))
                );
            }
        }
        $qb->andWhere($andStatements);

        return $qb->getQuery();
    }
}
