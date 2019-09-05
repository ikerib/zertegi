<?php

namespace App\Repository;

use App\Entity\Pendientes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Pendientes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pendientes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pendientes[]    findAll()
 * @method Pendientes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PendientesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
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
}
