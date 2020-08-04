<?php

namespace App\Repository;

use App\Entity\Club;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Club|null find($id, $lockMode = null, $lockVersion = null)
 * @method Club|null findOneBy(array $criteria, array $orderBy = null)
 * @method Club[]    findAll()
 * @method Club[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Club::class);
    }

    // /**
    //  * @return Club[] Returns an array of Club objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Club
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function obtenerPistas($idclub){
        $conn= $this->getEntityManager()->getConnection();

        $sql = "select deporte.id as 'idDeporte',deporte.nombre as 'NombreDeporte',pista.id as 'idPista',pista.nombre as 'NombrePista',pista.tipo_id as 'idTipoPista', tipo.nombre as 'TipoPista', pista.imagen as 'Imagen', pista.precio as 'Precio' from club JOIN pista on club.id = pista.club_id 
        join deporte on pista.deporte_id = deporte.id 
        join tipo on pista.tipo_id = tipo.id
        where club.id = $idclub group by deporte.id, pista.id, tipo.id";

        $stmt = $conn->prepare($sql);
        $stmt ->execute();
        return $stmt->fetchAll();
    }

    
}
