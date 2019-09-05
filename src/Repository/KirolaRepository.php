<?php

namespace App\Repository;

use App\Entity\Kirola;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kirola|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kirola|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kirola[]    findAll()
 * @method Kirola[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KirolaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kirola::class);
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
