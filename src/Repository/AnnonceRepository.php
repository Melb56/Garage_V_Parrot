<?php

namespace App\Repository;

use App\Data\SearchData;
use App\Entity\Annonce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;



/**
 * @extends ServiceEntityRepository<Annonce>
 *
 * @method Annonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonce[]    findAll()
 * @method Annonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry, 
                                PaginatorInterface $paginatorInterface)
    {
        parent::__construct($registry, Annonce::class);
        $this->paginatorInterface = $paginatorInterface;
       

    }

    /* Récupère les annonces en lien avec une recherche
    * @param SearchData $searchData
    * @return PaginatorInterface
    */
    public function findBySearch(SearchData $searchData): array
    {
        $query = $this
            ->createQueryBuilder('p');
        
        if (!empty($searchData->q)){
            $query = $query
                ->andWhere('p.title LIKE :q')
                ->setParameter('q', "%{$searchData->q}%");
                
        }

        if (!empty($searchData->min)){
            $query = $query
                ->andWhere('p.price >= :min')
                ->setParameter('min', $searchData->min);
                
        }

        if (!empty($searchData->min)){
            $query = $query
                ->andWhere('p.price <= :max')
                ->setParameter('max', $searchData->max);
                
        }

        if (!empty($searchData->kmMin)){
            $query = $query
                ->andWhere('p.km >= :kmMin')
                ->setParameter('kmMin', $searchData->kmMin);
                
        }

        if (!empty($searchData->kmMax)){
            $query = $query
                ->andWhere('p.km <= :kmMax')
                ->setParameter('kmMax', $searchData->kmMax);
                
        } 

            if (!empty($searchData->dateTimeMin)){
                $query = $query
                    ->andWhere('p.dateTime >= :dateTimeMin')
                    ->setParameter('dateTimeMin', $searchData->dateTimeMin);
                
        }

           if (!empty($searchData->dateTimeMax)){
            $query = $query
                ->andWhere('p.dateTime <= :dateTimeMax')
                ->setParameter('dateTimeMax', $searchData->dateTimeMax);
                
        }
        
        return $query->getQuery()->getResult();

                
    
    }
}
   
