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
        $qb->andWhere('MATCH_AGAINST(a.espedientea, a.data, a.sailkapena, a.signatura, a.oharrak) AGAINST (:searchterm boolean) > 0')
            ->setParameter('searchterm',$filter);

        return $qb;
    }

    public function fieldFullTextSearch($query): \Doctrine\ORM\Query
    {
        $qb = $this->createQueryBuilder('a');
        $andStatements = $qb->expr()->andX();
        foreach ($query as $key=>$value) {
            // begiratu espazioak dituen
            //$value = explode(" ", $value[0]);
            preg_match_all('/"(?:\\\\.|[^\\\\"])*"|\S+/', $value[0], $searchTerms);
            foreach ($searchTerms[0] as $i => $iValue) {
                $andStatements->add($qb->expr()->like("a.$key", $qb->expr()->literal('%' . str_replace('"','',$iValue ) . '%')));
            }
        }
        $qb->andWhere($andStatements);

        return $qb->getQuery();
    }
}
