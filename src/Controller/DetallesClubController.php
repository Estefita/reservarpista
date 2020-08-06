<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClubRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Club;
use App\Entity\Reserva;
use Symfony\Component\HttpFoundation\Request;

class DetallesClubController extends AbstractController
{
    /**
     * @Route("/detalles/club/{id}", name="detalles_club")
     */
    public function index($id,Request $request, ClubRepository $clubRepository)
    {
        //$idclub = $request->request->get('idclub');
        $club = $this->getDoctrine()->getRepository(Club::class)->find($id);
        $pista = $this->getDoctrine()->getRepository(Club::class)->obtenerPistas($id);
        //$fechareserva = $request->query->get('fechareserva');
        //dd($pista);
        $auxnombre = array_column($pista,"NombreDeporte", "idDeporte");
        $tipodeporte = array_unique($auxnombre);
        $horasReservadas = $this->claseHoraReservada($id, '2020-08-07');
        //$horasReservadas = array();
        return $this->render('web/detallesclub/detallesclub.html.twig', [
            'pistas' => $pista,
            'club' => $club,
            'tipodeportes' => $tipodeporte,
            'horasReservadas' => $horasReservadas,

        ]);
    }

    /**
     * @Route("/hrnodisponible", name="app_horareservanodisponible" ,methods={"POST"})
     */
    public function horaReservaNoDisponible($idclub, $fechareserva ){
        $list = $this->claseHoraReservada($idclub, $fechareserva);
        return $this->json([
            'list' => $list,
        ]); 
    }

    public function claseHoraReservada($idclub,$fechareserva){
        $reserva = $this->getDoctrine()->getRepository(Reserva::class)->HoraReservada($idclub,$fechareserva);   
        $auxTodasPistas = array_column($reserva, "id");
        $auxPistas = array_unique($auxTodasPistas);
        $horasreservadas = [];
        //dump($auxTodasPistas);
        foreach($auxPistas as $item){
            $indicePistasRepes = array_keys($auxTodasPistas, $item);
            $horasPista = [];           
            foreach($indicePistasRepes as $indice){
                $enteroHoraDesde = idate('H',strtotime($reserva[$indice]["horadesde"]));
                $enteroHoraHasta = idate('H',strtotime($reserva[$indice]["horahasta"]));
                $hora = $this->cambiarFormato($enteroHoraDesde, $enteroHoraHasta);
                $horasPista[] = $hora->getDesde();                
                if(!is_null($hora->getHasta())){
                    $horasPista[] = $hora->getHasta();
                }                
            }            
            $horasreservadas[$item] = $horasPista;            
        }     
        
        return $horasreservadas;
    }

    public function cambiarFormato($horaDesde, $horaHasta){
        $hora = new Hora();
        $diferencia = $horaHasta - $horaDesde;
        $hora->setDesde($horaDesde);        
        if($diferencia == 2){                    
            $hora->setHasta($horaHasta-1);
        }
        return $hora;
    }

}

class Hora {
    private $desde;
    private $hasta;

    public function getDesde(): ?int
    {
        return $this->desde;
    }

    public function setDesde(int $desde): self
    {
        $this->desde = $desde;

        return $this;
    }
    public function getHasta(): ?int
    {
        return $this->hasta;
    }

    public function setHasta(int $hasta): self
    {
        $this->hasta = $hasta;

        return $this;
    }
}

