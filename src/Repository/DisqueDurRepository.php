<?php

namespace App\Repository;

use App\Entity\DisqueDur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DisqueDur|null find($id, $lockMode = null, $lockVersion = null)
 * @method DisqueDur|null findOneBy(array $criteria, array $orderBy = null)
 * @method DisqueDur[]    findAll()
 * @method DisqueDur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisqueDurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DisqueDur::class);
    }

    // /**
    //  * @return DisqueDur[] Returns an array of DisqueDur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DisqueDur
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
