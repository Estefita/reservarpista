<?php

namespace App\Controller;

use App\Entity\Club;
use App\Repository\ClubRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WebController extends AbstractController
{
    /**
     * @Route("/listadoClubs", name="app_club_list", methods={"GET"})
     */
    public function index(ClubRepository $clubRepository): Response
    {
        return $this->render('web/index.html.twig', [
            'clubs' => $clubRepository->findAll(),
        ]);
    }

     /**
     * @Route("/{id}", name="app_club_show", methods={"GET"})
     */
    public function show(Club $club): Response
    {
        return $this->render('web/detallesclub/detallesclub.html.twig', [
            'club' => $club,
        ]);
    }
}
