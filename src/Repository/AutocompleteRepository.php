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

        $sql = "(SELECT * from autocomplete where tipo = 'C'
            AND textobusqueda LIKE :texto
            LIMIT 0,5)
            UNION ALL
            (SELECT * from autocomplete where tipo = 'L'
            AND textobusqueda LIKE :texto
            LIMIT 0,5)";

        $stmt = $conn->prepare($sql);
        $stmt ->execute(['texto'=> "%".$textobusqueda."%"]);
       // dd($stmt->fetchAll());
        return $stmt->fetchAll();
    }   
    
    public function insertarclub($idclub){
        $conn= $this->getEntityManager()->getConnection();

        // insertar clud en autocomplete
        $insertar = "INSERT INTO autocomplete (textobusqueda, tipo, admin1code, admin2code, admin3code,idclub) 
        SELECT CONCAT(g1.nomclub ".","." g2.textobusqueda),'C',g2.admin1code,g2.admin2code,g2.admin3code,g1.id FROM club AS g1 JOIN autocomplete AS g2                                   
        WHERE g1.admin2Code = g2.admin2code 
        and g1.admin3Code = g2.admin3code 
        and g1.id=$idclub";
         
        $st = $conn->prepare($insertar);
        $st ->execute();
        //return $st;
    }
}
