<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminSecuController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
    */
    public function index(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder): Response
    {
        $user = new User();
        $form = $this->createForm(InscriptionType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $securePassword = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword(($securePassword));
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute("aliments_list");
        }
        return $this->render('admin_secu/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/connection", name="connection")
    */
    public function connect(): Response
    {
        return $this->render('admin_secu/login.html.twig');
    }

    /**
     * @Route("/deconnection", name="deconnection")
    */
    public function disconnect(): Response
    {
        return $this->redirectToRoute("aliments_list");
    }
}
