<?php

namespace App\Repository;

use App\Entity\Anarbe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Anarbe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Anarbe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Anarbe[]    findAll()
 * @method Anarbe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnarbeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Anarbe::class);
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
