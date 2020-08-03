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
            'club' => $club,
            'pistas' => $pista,
        ]);
    }

    public function addReserva(Request $request){
        $reserva = new Reserva();    
        //$cat->setFechacreacion(new \DateTime); Sepuede poner aquí solo o abajo con el else
        
        $id = $request->request->get('id');
        $existeID = isset($id) && !empty($id);
        if ($existeID) {
            //categoria para editar
            $reserva = $this->getDoctrine()->getRepository(Reserva::class)->find($id);
        }else{
            /*categoria nueva. la editada no se le modifica la fecha, porque si no,
            fechacreacion seria para nada, porque cambiaría cada vez que se modifica
            la categoría,otra cosa es poner un campo fecha de modificación y ahí si
            que se pondría donde está el nombre, abajo.*/
            $reserva->setFechareserva(new \DateTime);
        }
        //el nombre siempre se guarda se cree o se edite

        $realizare = $this->getDoctrine()->getRepository(Reserva::class)->Guardar($reserva);
        return $this->render('categoria/insertUpdate.html.twig', [
            'realizare' => $realizare,
        ]);
    }
}
