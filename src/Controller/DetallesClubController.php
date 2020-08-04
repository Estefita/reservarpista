<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClubRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Club;
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
        //dd($pista);
        $auxnombre = array_column($pista,"NombreDeporte", "idDeporte");
        $tipodeporte = array_unique($auxnombre);
        //dd($tipodeporte);
        $horasReservadas = array(8, 9, 18, 20,);        
        return $this->render('web/detallesclub/detallesclub.html.twig', [
            'pistas' => $pista,
            'club' => $club,
            'tipodeportes' => $tipodeporte,
            'horasReservadas' => $horasReservadas,
        ]);
    }

}
