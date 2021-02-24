<?php

namespace App\Repository;

use App\Entity\Liburuxka;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Liburuxka|null find($id, $lockMode = null, $lockVersion = null)
 * @method Liburuxka|null findOneBy(array $criteria, array $orderBy = null)
 * @method Liburuxka[]    findAll()
 * @method Liburuxka[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LiburuxkaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Liburuxka::class);
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
