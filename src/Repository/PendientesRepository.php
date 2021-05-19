<?php

namespace App\Repository;

use App\Entity\Pendientes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;


/**
 * @method Pendientes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pendientes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pendientes[]    findAll()
 * @method Pendientes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PendientesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pendientes::class);
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

    public function fullTextSearch($filter): Query
    {
        $qb = $this->createQueryBuilder( 'a');
        $qb->andWhere('MATCH_AGAINST(a.espedientea, a.data, a.signatura) AGAINST (:searchterm boolean) > 0')
            ->setParameter('searchterm',$filter);

        return $qb->getQuery();
    }

    public function fieldFullTextSearch($query): \Doctrine\ORM\Query
    {
        $qb = $this->createQueryBuilder('a');
        $andStatements = $qb->expr()->andX();
        foreach ($query as $key=>$value) {
            // begiratu espazioak dituen
            $value = explode(" ", $value[0]);
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
