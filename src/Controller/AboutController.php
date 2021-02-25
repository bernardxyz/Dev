<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    /**
     * @Route("/about", name="about")
     */
    public function index(): Response
    {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('about/index.html.twig' , array('users' => $users));
    }

    /**
     * @Route("/delete/{id}", name="app_delete")
     */
    public function remove(User $user): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->remove($user);
        $entityManager->flush();

        $this->addFlash('removed', 'User '.$user->getFullName().' removed');

        return $this->redirectToRoute('about');
    }
}
