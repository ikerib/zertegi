<?php

namespace App\Repository;

use App\Entity\Consultas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Consultas|null find($id, $lockMode = null, $lockVersion = null)
 * @method Consultas|null findOneBy(array $criteria, array $orderBy = null)
 * @method Consultas[]    findAll()
 * @method Consultas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConsultasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Consultas::class);
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
        $qb->andWhere('MATCH_AGAINST(a.izena, a.helbidea, a.gaia, a.enpresa, a.kontsulta) AGAINST (:searchterm boolean) > 0')
            ->setParameter('searchterm',$filter);

        return $qb;
    }
}
