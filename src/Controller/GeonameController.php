<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\GeonameRepository;

class GeonameController extends AbstractController
{
    /**
     * @Route("/listadoccaa", name="app_listadoccaa",methods={"POST"})
     */
    public function listComunidades(GeonameRepository $geonameRepository)
    {
        $listComunidades = $geonameRepository->getComunidades();
        return $this->json([
            'listComunidades' => $listComunidades,
        ]);        
    }

    /**
     * @Route("/listadopro", name="app_listadopro", methods={"POST"})
     */
    public function listProvincias(Request $request, GeonameRepository $geonameRepository)
    {
        $admin1code = $request->request->get('admin1code');
        $listProvincias = $geonameRepository->getProvincias($admin1code);
        //dd($request->request);
        return $this->json([
            'listProvincias' => $listProvincias,
        ]);

    }

    /**
     * @Route("/listadopobla", name="app_listadopobla", methods={"POST"})
     */
    public function listPoblacion(Request $request, GeonameRepository $geonameRepository)
    {
        $admin1code = $request->request->get('admin1code');
        $admin2code = $request->request->get('admin2code');
        $listPoblacion = $geonameRepository->getPoblacion($admin1code,$admin2code);
        //dd($request->request);
        return $this->json([
            'listPoblacion' => $listPoblacion,
        ]);

    }
}
