<?php

namespace App\Repository;

use App\Entity\Memoires;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Memoires|null find($id, $lockMode = null, $lockVersion = null)
 * @method Memoires|null findOneBy(array $criteria, array $orderBy = null)
 * @method Memoires[]    findAll()
 * @method Memoires[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MemoiresRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Memoires::class);
    }

    // /**
    //  * @return Memoires[] Returns an array of Memoires objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Memoires
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
