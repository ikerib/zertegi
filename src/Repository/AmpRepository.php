<?php

namespace App\Repository;

use App\Entity\Amp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @method Amp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Amp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Amp[]    findAll()
 * @method Amp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AmpRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Amp::class);
    }

    public function fullTextSearch($filter): \Doctrine\ORM\Query
    {
        $qb = $this->createQueryBuilder( 'a');
        $qb->andWhere('MATCH_AGAINST(a.expediente, a.fecha, a.clasificacion, a.signatura, a.observaciones) AGAINST (:searchterm boolean) > 0')
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
