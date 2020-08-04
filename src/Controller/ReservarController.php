<?php

namespace App\Controller;

use App\Repository\GeonameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClubRepository;
use App\Entity\Club;
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
    public function resumenreserva($id,Request $request, ClubRepository $clubRepository){
        $club = $this->getDoctrine()->getRepository(Club::class)->find($id);
        $pista = $this->getDoctrine()->getRepository(Club::class)->obtenerPistas($id);
        return $this->render('reservar/resumenreserva.html.twig', [
            'controller_name' => 'ReservarController',
            'clubs' => $club,
            'pistas' => $pista,
        ]);
    }

    public function addReserva(Request $request){
        $reserva = new Reserva();            
        $id = $request->request->get('id');
        $existeID = isset($id) && !empty($id);
        if ($existeID) {
            $reserva = $this->getDoctrine()->getRepository(Reserva::class)->find($id);
        }else{
            $reserva->setFechareserva(new \DateTime);
        }

        $realizare = $this->getDoctrine()->getRepository(Reserva::class)->Guardar($reserva);
        return $this->render('reservar/insertUpdate.html.twig', [
            'realizare' => $realizare,
        ]);
    }
}
