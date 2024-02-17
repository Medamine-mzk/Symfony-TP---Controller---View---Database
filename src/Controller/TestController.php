<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{
    //attributes...........

    //methods.............
    #[Route('/hello')]
    public function index(): Response
    {
        return new Response("Hello World !");
    }

    #[Route('/hello/{myName}')]
    public function indexName($myName): Response
    {
        return new Response("Hello World ! ".$myName);
    }

    
    #[Route('/calc/mul/{x}/{y}', name: 'urlCalcMul')]
    public function calcMul($x,$y): Response
    {   
        $res = $x * $y;
        return new Response("Calcule -MUL> ! ".$res);
    }

    #[Route('/showList/{genre}', name: 'showList')]
    public function showListFilms($genre): Response
    {   //base de donnée
        //list des films
        //env listFilms twig !
        $res = $x * $y;
        return new Response("Calcule -MUL> ! ".$res);
    }


    //
   
}
