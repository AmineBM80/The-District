<?php

namespace App\Controller;

use App\Entity\Plat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/plat', name: 'plats_')]
class PlatsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('plats/index.html.twig', [
            'controller_name' => 'PlatsController',
        ]);
    }

    #[Route('/{slug}', name: 'details')]
    public function details(Plat $plats): Response
    {

        return $this->render('plats/details.html.twig',[
            'plats' => $plats
        ]);
    }
}
