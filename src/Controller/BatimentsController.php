<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BatimentsController extends AbstractController
{
    #[Route('/batiments', name: 'app_batiments')]
    public function index(): Response
    {
        return $this->render('batiments/index.html.twig', [
            'controller_name' => 'BatimentsController',
        ]);
    }
}
