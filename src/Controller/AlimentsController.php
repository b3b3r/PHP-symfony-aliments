<?php

namespace App\Controller;

use App\Repository\AlimentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlimentsController extends AbstractController
{
    /**
     * @Route("/aliments", name="aliments-list")
     */
    public function index(AlimentRepository $alimentRepository): Response
    {
        return $this->render('aliments/index.html.twig', [
            'aliments' => $alimentRepository->findAll()
        ]);
    }

    /**
     * @Route("/aliments/{calory}", name="alimentsByCalory")
     */
    public function alimentWIthLessCatelory(AlimentRepository $alimentRepository, int $calory): Response
    {
        return $this->render('aliments/index.html.twig', [
            'aliments' => $alimentRepository->getAlimentByCalory($calory)
        ]);
    }
}
