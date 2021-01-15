<?php

namespace App\Controller\Admin;

use App\Entity\Aliment;
use App\Form\AlimentType;
use App\Repository\AlimentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AlimentsController extends AbstractController
{
    /**
     * @Route("/admin/aliments", name="admin_aliments")
     */
    public function index(AlimentRepository $alimentRepository): Response
    {
        return $this->render('admin/aliments/index.html.twig', [
            'aliments' => $alimentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/aliments/new", name="admin_aliments_new")
     * @Route("/admin/aliments/{id}", name="admin_aliments_edit")
     */
    public function edit(Aliment $aliment, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(AlimentType::class, $aliment);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($aliment);
            $manager->flush();
            return $this->redirectToRoute("admin_aliments");
        }
        
        return $this->render('admin/aliments/edit.html.twig', [
            'aliment' => $aliment,
            'form' => $form->createView()
        ]);
    }
}
