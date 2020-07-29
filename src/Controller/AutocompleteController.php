<?php

namespace App\Controller;

use App\Entity\Autocomplete;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AutocompleteRepository;
use Symfony\Component\HttpFoundation\Request;

class AutocompleteController extends AbstractController
{
    /**
     * @Route("/autocomplete", name="autocomplete")
     */
    public function index()
    {
        return $this->render('autocomplete/index.html.twig', [
            'controller_name' => 'AutocompleteController',
        ]);
    }

    
    /**
     * @Route("/busqueda/{texto?}", name="busqueda", methods={"POST"})
     */
    public function busqueda(Request $request, $texto){
        
        $texto = $request->request->get('texto');
        //dd($texto);
        $busqueda = $this->getDoctrine()->getRepository(Autocomplete::class)->busqueda($texto);
        return $this->json([
            'texto' => $busqueda,
        ]);
    }
}
