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
        $aliments = $alimentRepository->findAll();
        if (isset($_GET['calory'])) {
            $aliments = $alimentRepository->getAlimentBy("calories", "<=", $_GET['calory']);
        };
        if (isset($_GET['glucide'])) {
            $aliments = $alimentRepository->getAlimentBy("glucides", "<=", floatval($_GET['glucide']));
        };
        return $this->render('aliments/index.html.twig', [
            'aliments' => $aliments
        ]);
    }
}
