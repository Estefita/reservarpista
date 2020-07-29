<?php

namespace App\Controller;

use App\Repository\GeonameRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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

    
}
