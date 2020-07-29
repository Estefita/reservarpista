<?php

namespace App\Repository;

use App\Entity\Geoname;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Geoname|null find($id, $lockMode = null, $lockVersion = null)
 * @method Geoname|null findOneBy(array $criteria, array $orderBy = null)
 * @method Geoname[]    findAll()
 * @method Geoname[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GeonameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Geoname::class);
    }

    // /**
    //  * @return Geoname[] Returns an array of Geoname objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Geoname
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function getComunidades(): ?array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.countrycode = :val')
            ->setParameter('val', 'ES')
            ->andWhere('g.featurecode= :valor')
            ->setParameter('valor','ADM1')
            ->orderBy('g.name')
            ->getQuery()
            ->getResult()
        ;
    }    

    public function getProvincias($admin1code): ?array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.countrycode = :val')
            ->setParameter('val', 'ES')
            ->andWhere('g.featurecode= :valor')
            ->setParameter('valor','ADM2')
            ->andWhere('g.admin1code = :admin1code')
            ->setParameter('admin1code', $admin1code)
            ->orderBy('g.name')
            ->getQuery()
            ->getResult()
        ;
    }   
    
    public function getPoblacion($admin1code,$admin2code): ?array
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.countrycode = :val')
            ->setParameter('val', 'ES')
            ->andWhere('g.featurecode= :valor')
            ->setParameter('valor','ADM3')
            ->andWhere('g.admin1code = :admin1code')
            ->setParameter('admin1code', $admin1code)
            ->andWhere('g.admin2code = :admin2code')
            ->setParameter('admin2code', $admin2code)
            ->orderBy('g.name')
            ->getQuery()
            ->getResult()
        ;
    }   
}
