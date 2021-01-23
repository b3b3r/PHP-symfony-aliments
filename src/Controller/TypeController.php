<?php

namespace App\Controller;

use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeController extends AbstractController
{
    /**
     * @Route("/type", name="types_list")
     */
    public function index(TypeRepository $typeRepository): Response
    {
        return $this->render('type/index.html.twig', [
            'types' => $typeRepository->findAll(),
        ]);
    }
}
