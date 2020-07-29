<?php

namespace App\Repository;

use App\Entity\Autocomplete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Autocomplete|null find($id, $lockMode = null, $lockVersion = null)
 * @method Autocomplete|null findOneBy(array $criteria, array $orderBy = null)
 * @method Autocomplete[]    findAll()
 * @method Autocomplete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutocompleteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Autocomplete::class);
    }

    // /**
    //  * @return Autocomplete[] Returns an array of Autocomplete objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Autocomplete
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function busqueda (string $textobusqueda){

        $conn= $this->getEntityManager()->getConnection();

        $sql = "(SELECT * from autocomplete where tipo = 'L'
            AND textobusqueda LIKE :texto
            LIMIT 0,5)
            UNION ALL
            (SELECT * from autocomplete where tipo = 'C'
            AND textobusqueda LIKE :texto
            LIMIT 0,5)";

        $stmt = $conn->prepare($sql);
        $stmt ->execute(['texto'=> "%".$textobusqueda."%"]);
       // dd($stmt->fetchAll());
        return $stmt->fetchAll();
    }    
}
