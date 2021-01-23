<?php

namespace App\Controller\Admin;

use App\Entity\Type;
use App\Form\TypeType;
use App\Repository\TypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TypesController extends AbstractController
{
    /**
     * @Route("/admin/types", name="admin_types")
     */
    public function index(TypeRepository $typeRepository): Response
    {
        return $this->render('admin/types/index.html.twig', [
            'types' => $typeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/types/new", name="admin_types_new")
     * @Route("/admin/types/{id}", name="admin_types_edit", methods="GET|POST")
     */
    public function edit(Type $type = null, Request $request, EntityManagerInterface $manager): Response
    {
        if (!$type) {
            !$type = new Type();
        }
        $form = $this->createForm(TypeType::class, $type);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $message = $type->getId() !== null 
            ? "La modification a bien été réalisée"
            : "L'ajout a bien été réalisé";
            $manager->persist($type);
            $manager->flush();
            $this->addFlash("success", $message);
            return $this->redirectToRoute("admin_types");
        }
        
        return $this->render('admin/types/edit.html.twig', [
            'type' => $type,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/types/{id}", name="admin_types_remove", methods="delete")
     */
    public function remove(Type $type, Request $request, EntityManagerInterface $manager): Response
    {
        if ($this->isCsrfTokenValid("SUP" .$type->getId(), $request->get('_token'))) {
            $manager->remove($type);
            $manager->flush();
            $this->addFlash("success", "L'opération a bien été réalisée");
            return $this->redirectToRoute("admin_types");
        }
    }
}
