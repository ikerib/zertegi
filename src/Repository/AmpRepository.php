<?php

namespace App\Repository;

use App\Entity\Amp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;
use function Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @method Amp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Amp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Amp[]    findAll()
 * @method Amp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AmpRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Amp::class);
    }

    public function getQueryByFinder($arr, $fields)
    {
        $qb = $this->createQueryBuilder('a');
        $expr = $qb->expr();
//        foreach ($arr as $key => $value) {
//            $miindex = 0;
//            foreach ($value as $v) {
//                $qb->orWhere($qb->expr()->like('a.'.$key, ':v'.$key.$miindex))->setParameter('v'.$key.$miindex, '%'.$v.'%');
//                    ++$miindex;
//            }
//        }


//        $exp1 =$qb->expr()->orX(
//            $qb->expr()->gt(2,1),
//            $qb->expr()->lt(3,2)
//        );
//        $qb->andWhere(
//          $exp1
//        );
//
//        $exp2 = $qb->expr()->orX(
//            $qb->expr()->gt(8, 6),
//            $qb->expr()->lt(5, 2)
//        );
//        $qb->andWhere(
//            $exp2
//        );

//        $miindex = 0;
//        $xp =null;
//        foreach ($arr as $key=>$value) {
//            foreach ($value as $i => $iValue) {
//                $toFind = [' ',',','?'];
//                $clean = str_replace($toFind, '__', $iValue);
//                $xp = $qb->expr()->orX(
//                    $qb->expr()->like('a.'.$key, ':v'.$key.$miindex),
//                    $qb->expr()->like('a.'.$key, ':vclean'.$miindex)
//                );
//                $qb->andWhere($xp)->setParameter('v'.$key.$miindex, '%'.$iValue.'%');
//                $qb->andWhere($xp)->setParameter('vclean'.$miindex, '%'.$clean.'%');
//                $miindex++;
//            }
//
//
//        }




//        return $qb->getQuery();

    }
}
