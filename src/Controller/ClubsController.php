<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ClubsController extends AbstractController
{
    /**
     * @Route("/club", name="club")
     */
    public function index()
    {
        return $this->render('club/index.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }


    /**
     * @Route("/detalle", name="detalle")
     */
    public function detalle()
    {
        return $this->render('club/detalle.html.twig', [
            'controller_name' => 'ClubController',
        ]);
    }
}
