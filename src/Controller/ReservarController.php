<?php

namespace App\Controller;

use App\Repository\GeonameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClubRepository;
use App\Entity\Club;
use App\Entity\Pista;
use App\Entity\Tipo;
use App\Entity\Reserva;

class ReservarController extends AbstractController
{
    /**
     * @Route("/reservar", name="reservar")
     */
    public function index(GeonameRepository $geonameRepository)
    {
        $comunidades = $geonameRepository->getComunidades();
        //dump($comunidades);
        return $this->render('reservar/index.html.twig', [
            'controller_name' => 'ReservarController',
            'geocomunidades' => $comunidades,
        ]);
    }

    /**
     * @Route("/resumenreserva/{id}", name="resumenreserva")
     */
    public function resumenreserva($id, Request $request, ClubRepository $clubRepository){
        
        $club = $this->getDoctrine()->getRepository(Club::class)->find($id);
        //$pista = $this->getDoctrine()->getRepository(Club::class)->obtenerPistas($id);
        $idPista = $request->query->get('idPista');
        
       // $idDeporte =$request->query->getDeporte();
        $desde = $request->query->get('desde');
        $hasta = $request->query->get('hasta');
        $fechareserva = $request->query->get('fechareserva');   
        $pista = $this->getDoctrine()->getRepository(Pista::class)->find($idPista);
        
        if($hasta == "" || $hasta == null || $hasta == 0){
            $hasta = $desde + 1;
        } else{
            $hasta = $hasta + 1;    
        }
        return $this->render('reservar/resumenreserva.html.twig', [
            'controller_name' => 'ReservarController',
            'club' => $club,
            'pistas' => $pista,
            'idPista' => $idPista,
            'desde' => $desde,
            'hasta' => $hasta,
            'fechareserva' => $fechareserva,
            'mensaje' => false,
           /*  'tipo' => $tipo, */
        ]);
    }

    /**
     * @Route("/confirmareserva", name="confirmareserva")
     */
    public function confirmarReserva(Request $request){
        $mensaje = 2;
        $reserva = new Reserva();            
        $idPista = $request->request->get('idPista');
        $idclub = $request->request->get('idclub');
        $desde = $request->request->get('desde');
        $hasta = $request->request->get('hasta');
        $fechareserva = $request->request->get('fechareserva');     
        $pista = $this->getDoctrine()->getRepository(Pista::class)->find($idPista); 
        $confirmar = $this->getDoctrine()->getRepository(Reserva::class)->ComprobarHoraReservada($idclub, $fechareserva, $desde, $hasta, $idPista);        
        if(count($confirmar)==0){

            $user = $this->getUser();        
            $reserva->setHoradesde(\DateTime::createFromFormat('H:i', $desde.":00"));
            $reserva->setHorahasta(\DateTime::createFromFormat('H:i', $hasta.":00"));
            $reserva->setFechareserva(\DateTime::createFromFormat('Y-m-d', $fechareserva));

            $reserva->setIdclub($pista->getClub()->getId());
            $reserva->setPrecio($pista->getPrecio());
            $reserva->setIdusuario($user->getId());
            $reserva->setEstado(0);
            $reserva->setIdpista($idPista);
            $mensaje = 1;
            $realizare = $this->getDoctrine()->getRepository(Reserva::class)->Save($reserva);            
        }

        return $this->render('reservar/resumenreserva.html.twig', [
            'controller_name' => 'ReservarController',
            'club' => $pista->getClub(),
            'pistas' => $pista,
            'idPista' => $idPista,
            'desde' => $desde,
            'hasta' => $hasta,
            'fechareserva' => $fechareserva,
            'mensaje' => $mensaje,
        ]);
    }

   
}
