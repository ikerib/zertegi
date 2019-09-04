<?php

namespace App\Repository;

use App\Entity\Ciriza;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ciriza|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ciriza|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ciriza[]    findAll()
 * @method Ciriza[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CirizaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ciriza::class);
    }

    public function getQueryByFinder($arr): \Doctrine\ORM\Query
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
