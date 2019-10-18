<?php

namespace App\Controller;


use App\Utils\ConvertNumber;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/convert", name="index", methods={"GET"})
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/convert", name="convert", methods={"POST"})
     */
    public function convert(Request $request)
    {
        $valeur = $request->query->get('valeur');
        $start = $request->query->get('start');
        $stop = $request->query->get('stop');

        $convert = new ConvertNumber($valeur);

        return $this->render('main/converted.html.twig', [
            'controller_name' => 'MainController',
            'valeur' => $valeur,
            'start' => $start,
            'stop' => $stop
        ]);
    }
}
