<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecepeController extends AbstractController
{
    #[Route('/recette', name: 'recepe.index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('pages/recepe/index.html.twig', [
            'controller_name' => 'RecepeController',
        ]);
    }
}
