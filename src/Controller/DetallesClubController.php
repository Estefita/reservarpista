<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ClubRepository;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Club;

class DetallesClubController extends AbstractController
{
    /**
     * @Route("/detalles/club/{id}", name="detalles_club")
     */
    public function index(ClubRepository $clubRepository)
    {
        $idclub = 1;
        $club = $this->getDoctrine()->getRepository(Club::class)->find($idclub);
        $pista = $this->getDoctrine()->getRepository(Club::class)->obtenerPistas($idclub);
        $auxnombre = array_column($pista,"NombreDeporte", "idDeporte");
        $tipodeporte = array_unique($auxnombre);
        //dd($tipodeporte);
        return $this->render('web/detallesclub/detallesclub.html.twig', [
            'pistas' => $pista,
            'club' => $club,
            'tipodeportes' => $tipodeporte,
        ]);
    }

    // /**
    //  *@Route("/{id}", name="deporte", methods={"GET"})
    //  */
    // public function obtenerPistas(ClubRepository $clubRepository): Response
    // {
    //     $idclub = 1;
    //     $pista = $this->getDoctrine()->getRepository(Club::class)->obtenerPistas($idclub);
    //     dd($pista);
    //     return $this->render('web/detallesclub.html.twig', [
    //         'pista' => $pista,
    //     ]);
    // }
}
