<?php

namespace App\Controller;

use App\Repository\RecepeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RecepeController extends AbstractController
{
    
    /**
     * This controller display all recepes
     *
     * @param RecepeRepository $repository
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    #[Route('/recette', name: 'recepe.index', methods: ['GET'])]
    public function index(
        RecepeRepository $repository,
        PaginatorInterface $paginator,
        Request $request
    ): Response {

        $recepes = $paginator->paginate(
            $repository->findAll(), 
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('pages/recepe/index.html.twig', [
            'recepes' => $recepes
        ]);
    }
}
