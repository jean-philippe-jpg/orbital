<?php

namespace App\Repository;

use App\Entity\Service;
use App\Entity\Categorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Categorie>
 */
class CategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorie::class, Service::class);
    }



     //    /**
    //     * @return Categorie[] Returns an array of Categorie objects
    //     */
       public function findOneById($id): array
       {
            return $this->createQueryBuilder('c')
                //->andWhere('c.service = :id')
                //->setParameter('id', $id)
                ->innerjoin('c.service', 's')
               // ->orderBy('c.id', 'ASC')
           // ->setMaxResults(10)
            ->getQuery()
                ->getResult()
            ;
        }
    //    /**
    //     * @return Categorie[] Returns an array of Categorie objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

     

    //    public function findOneBySomeField($value): ?Categorie
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
