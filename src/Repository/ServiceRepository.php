<?php

namespace App\Repository;

use App\Entity\Categorie;
use App\Entity\Service;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Service>
 */
class ServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Service::class, Categorie::class);
    }


    public function findOneById(int $id): array
       {

           $entityManager = $this->getEntityManager();

           $query = $entityManager->createQuery(
               'SELECT s, c
               FROM App\Entity\Service s
               JOIN s.categorie c
               WHERE c.id = :id'
           )->setParameter('id', $id);
            
            return $query->getResult();
            //->from( 'Categorie', 'c' )
           // ->innerJoin( 'c.services', 's' )
            //->where('c.id = :id')
            //->setParameter('id', $id)
           // ->getQuery()
           // ->getResult()
            
       }

    //    /**
    //     * @return Service[] Returns an array of Service objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Service
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
