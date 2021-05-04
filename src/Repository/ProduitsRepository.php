<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Produits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;
use PhpParser\Node\Stmt\Echo_;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method Produits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produits[]    findAll()
 * @method Produits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitsRepository extends ServiceEntityRepository
{

    private $paginator;
    // private $request;


    public function __construct(ManagerRegistry $registry, PaginatorInterface $paginator)
    {
        parent::__construct($registry, Produits::class);
        $this -> paginator =  $paginator;
        // $this -> request =  $request;

    }
 



    /**
     * @return Users[] Returns an array of Users objects
     */
    public function allProduits()
    {
        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder ->select('count(p.id) as value');
            
        return $queryBuilder->getQuery()->getOneOrNullResult() 
        ;
    }

    /**
     * @return PaginatorInterface Returns an array of Users objects
     */
    public function Search(SearchData $search)
    {
        $query=$this->createQueryBuilder('p')
                    // ->select('p','c')
                    ->join('p.sousCategorie', 's')
                    ->join('p.marque', 'm')
                    ->join('p.processeur', 'k')
                    ->join('p.memoire', 'e')
                    ->join('p.disqueDur', 'd')
                    ->join('p.carteGraphique', 'c')
                    ->join('p.systemeExploitation', 'y');

                    if (!empty($search->q)){
                        $query=$query->andWhere('p.libel LIKE :q')
                                     ->setParameter('q',"%{$search->q}%");
                    }
                    if (!empty($search->sousCategories)){
                        $query=$query->andWhere('s.id IN (:sousCategories)')
                                     ->setParameter('sousCategories', $search->sousCategories );
                    } 

                    if (!empty($search->marques)){
                        $query=$query->andWhere('m.id IN (:marques)')
                                     ->setParameter('marques', $search->marques );
                    }

                    if (!empty($search->processeur)){
                        $query=$query->andWhere('k.id IN (:processeur)')
                                     ->setParameter('processeur', $search->processeur );
                    }

                    if (!empty($search->memoires)){
                        $query=$query->andWhere('e.id IN (:memoires)')
                                     ->setParameter('memoires', $search->memoires );
                    }

                    if (!empty($search->disqueDur)){
                        $query=$query->andWhere('d.id IN (:disqueDur)')
                                     ->setParameter('disqueDur', $search->disqueDur );
                    }


                    if (!empty($search->carteGraphique)){
                        $query=$query->andWhere('c.id IN (:carteGraphique)')
                                     ->setParameter('carteGraphique', $search->carteGraphique );
                    }

                    if (!empty($search->systemeExploitation)){
                        $query=$query->andWhere('y.id IN (:systemeExploitation)')
                                     ->setParameter('systemeExploitation', $search->systemeExploitation );
                    }
            
                $query= $query->getQuery()->getResult();
            return $this -> paginator ->paginate(
                $query, /* query NOT result */
                $search->page, /*page number*/  
                // $request->query->getInt('page', 1)
                9 /*limit per page*/);
        
    }

    // /**
    //  * @return Produits[] Returns an array of Produits objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Produits
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
