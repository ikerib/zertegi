<?php

namespace App\Repository;

use App\Entity\Argazki;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Argazki|null find($id, $lockMode = null, $lockVersion = null)
 * @method Argazki|null findOneBy(array $criteria, array $orderBy = null)
 * @method Argazki[]    findAll()
 * @method Argazki[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArgazkiRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Argazki::class);
    }

    public function getQueryByFinder($arr): Query
    {
        $qb = $this->createQueryBuilder('a');

        foreach ($arr as $key=>$value) {
            foreach ($value as $v) {
                $qb->orWhere(
                    $qb->expr()->like('a.'.$key,':v'.$key)
                )->setParameter('v'.$key,'%'.$v.'%');
            }
        }

        return $qb->getQuery();

    }
}
