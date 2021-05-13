<?php

namespace App\Repository;

use App\Entity\Argazki;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Argazki|null find($id, $lockMode = null, $lockVersion = null)
 * @method Argazki|null findOneBy(array $criteria, array $orderBy = null)
 * @method Argazki[]    findAll()
 * @method Argazki[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArgazkiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Argazki::class);
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
        $qb->andWhere('MATCH_AGAINST(a.deskribapena, a.barrutia, a.fecha, a.gaia, a.oharrak) AGAINST (:searchterm boolean) > 0')
            ->setParameter('searchterm',$filter);

        return $qb;
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
