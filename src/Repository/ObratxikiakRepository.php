<?php

namespace App\Repository;

use App\Entity\Obratxikiak;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Obratxikiak|null find($id, $lockMode = null, $lockVersion = null)
 * @method Obratxikiak|null findOneBy(array $criteria, array $orderBy = null)
 * @method Obratxikiak[]    findAll()
 * @method Obratxikiak[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObratxikiakRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Obratxikiak::class);
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
