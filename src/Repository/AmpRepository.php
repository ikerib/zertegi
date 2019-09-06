<?php

namespace App\Repository;

use App\Entity\Amp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;


/**
 * @method Amp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Amp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Amp[]    findAll()
 * @method Amp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AmpRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Amp::class);
    }

    public function getQueryByFinder($arr, $fields): Query
    {
        $qb = $this->createQueryBuilder('a');
        $expr = $qb->expr();
        foreach ($arr as $key => $value) {
            $miindex = 0;
            if ( $key === 'Kontsulta') {
                foreach ($fields as $field) {
                    foreach ($value as $v) {
                        $toFind = [' ',',','?'];
                        $clean = str_replace($toFind, '__', $v);

                        $qb->andWhere(
                            $qb->expr()->orX(
                                $expr->like($field, '%'.$v.'%'),
                                $expr->like($field, '%'.$clean.'%')
                            )
                        )
                        ;
                    }
                }
            } else {
                foreach ($value as $v) {
                    $qb->andWhere($qb->expr()->like('a.'.$key, ':v'.$key.$miindex))->setParameter('v'.$key.$miindex, '%'.$v.'%');
                    ++$miindex;
                }
            }
        }


        return $qb->getQuery();
    }
}
