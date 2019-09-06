<?php

namespace App\Repository;

use App\Entity\Amp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;
use function Doctrine\ORM\QueryBuilder;

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
                    $contLoop=0;
                    foreach ($value as $v) {
                        $toFind = [' ',',','?'];
                        $clean = str_replace($toFind, '_', $v);

                        $qb->orWhere(
                            $qb->expr()->andX(
                                $qb->expr()->andX($expr->like('a.'.$field, ':v'.$field.$miindex)),
                                $qb->expr()->andX($expr->like('a.'.$field, ':v2'.$field.$miindex))
                            )
                        )->setParameter('v'.$field.$miindex, '%'.$v.'%')
                        ->setParameter('v2'.$field.$miindex, '%'.$clean.'%');
//                        $qb
//                            ->orWhere(
//                                $expr->andX(
//                                    $expr->like('a.'.$field, ':v'.$field.$miindex),
//                                    $expr->like('a.'.$field, ':v2'.$field.$miindex)
//                                )
//                            )->setParameter('v'.$field.$miindex, '%'.$v.'%')
//                            ->setParameter('v2'.$field.$miindex, '%'.$clean.'%');

                        ++$miindex;
                    }
                    ++$contLoop;
                }
            } else {
                foreach ($value as $v) {
                    $qb->orWhere($qb->expr()->like('a.'.$key, ':v'.$key.$miindex))->setParameter('v'.$key.$miindex, '%'.$v.'%');
                    ++$miindex;
                }
            }
        }

        return $qb->getQuery();
    }
}
