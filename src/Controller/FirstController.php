<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FirstController extends AbstractController
{
    #[Route('/', name: 'app_first')]
    public function index(): Response
    {
        return $this->render('first/index.html.twig');
    }

    #[Route('/calc/add/{x}/{y}', name: 'urlCalcAdd')]
    public function calcAdd($x,$y): Response
    {   
        $res = $x + $y;
        return $this->render('calcView/calc.html.twig', [
            'x' => $x,
            'y' => $y,
            'res' => $res
        ]);
    }
}
