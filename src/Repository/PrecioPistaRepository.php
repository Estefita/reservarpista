<?php

namespace App\Repository;

use App\Entity\PrecioPista;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrecioPista|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrecioPista|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrecioPista[]    findAll()
 * @method PrecioPista[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrecioPistaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrecioPista::class);
    }

    // /**
    //  * @return PrecioPista[] Returns an array of PrecioPista objects
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
    public function findOneBySomeField($value): ?PrecioPista
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
