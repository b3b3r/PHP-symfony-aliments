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
     * @Route("/admin/aliments/{id}", name="admin_aliments_edit", methods="GET|POST")
     */
    public function edit(Aliment $aliment = null, Request $request, EntityManagerInterface $manager): Response
    {
        if (!$aliment) {
            !$aliment = new Aliment();
        }
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

    /**
     * @Route("/admin/aliments/{id}", name="admin_aliments_remove", methods="delete")
     */
    public function remove(Aliment $aliment, Request $request, EntityManagerInterface $manager): Response
    {
        if ($this->isCsrfTokenValid("SUP" .$aliment->getId(), $request->get('_token'))) {
            $manager->remove($aliment);
            $manager->flush();
            return $this->redirectToRoute("admin_aliments");
        }
    }
}
