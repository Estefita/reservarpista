<?php

namespace App\Repository;

use App\Entity\Reserva;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Reserva|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reserva|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reserva[]    findAll()
 * @method Reserva[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reserva::class);
    }

    // /**
    //  * @return Reserva[] Returns an array of Reserva objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reserva
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function HoraReservada($idclub, $fechareserva){
        $conn= $this->getEntityManager()->getConnection();

        $sql="SELECT p.id, horadesde, horahasta FROM reserva as re
        JOIN pista as p on re.idpista=p.id
        JOIN club as c on re.idclub=c.id 
        where idclub = $idclub
        and fechareserva = '$fechareserva'";

        $stmt = $conn->prepare($sql);
        $stmt ->execute();
        return $stmt->fetchAll();
    } 

    public function Save(Reserva $reserva):Reserva {           
        $em = $this->getEntityManager();
        $em->persist($reserva);
        $em->flush();
        
        return $reserva;
    }
}
