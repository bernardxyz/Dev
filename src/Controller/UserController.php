<?php

namespace App\Controller;

use App\Controller\Common\BaseController;
use App\Entity\User;
use App\Form\User1Type;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/user")
 */
class UserController extends BaseController
{
    CONST BREAD_CRUMB = 'Organization';
    CONST ACTIVE_MENU = 'user';
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(): Response
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        return $this->render('user/index.html.twig',
            [
                'users' => $users,
                'breadCrumb' => self::BREAD_CRUMB,
                'activeMenu' => $this->activeMenu(self::ACTIVE_MENU)
            ]
        );
    }

    /**
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(User1Type::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig',
            [
                'user' => $user,
                'form' => $form->createView(),
                'breadCrumb' => self::BREAD_CRUMB,
                'activeMenu' => $this->activeMenu(self::ACTIVE_MENU)
            ]
        );
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig',
            [
                'user' => $user,
                'breadCrumb' => self::BREAD_CRUMB,
                'activeMenu' => $this->activeMenu(self::ACTIVE_MENU)
            ]
        );
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(User1Type::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig',
            [
                'user' => $user,
                'form' => $form->createView(),
                'breadCrumb' => self::BREAD_CRUMB,
                'activeMenu' => $this->activeMenu(self::ACTIVE_MENU)
            ]
        );
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }
}
