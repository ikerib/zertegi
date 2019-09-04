<?php

namespace App\Repository;

use App\Entity\Hutsak;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Hutsak|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hutsak|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hutsak[]    findAll()
 * @method Hutsak[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HutsakRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Hutsak::class);
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
