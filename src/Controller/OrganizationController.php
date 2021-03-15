<?php

namespace App\Controller;

use App\Controller\Common\BaseController;
use App\Entity\Organization;
use App\Form\OrganizationType;
use App\Repository\OrganizationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/organization")
 */
class OrganizationController extends BaseController
{
    CONST BREAD_CRUMB = 'Home';
    CONST ACTIVE_MENU = 'organization';

    /**
     * @Route("/", name="organization_index", methods={"GET"})
     */
    public function index(OrganizationRepository $organizationRepository): Response
    {
        return $this->render('organization/index.html.twig',
            [
                'organizations' => $organizationRepository->findAll(),
                'breadCrumb' => self::BREAD_CRUMB,
                'activeMenu' => $this->activeMenu(self::ACTIVE_MENU)
            ]
        );
    }

    /**
     * @Route("/new", name="organization_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $organization = new Organization();
        $form = $this->createForm(OrganizationType::class, $organization);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($organization);
            $entityManager->flush();

            return $this->redirectToRoute('organization_index');
        }

        return $this->render('organization/new.html.twig',
            [
                'organization' => $organization,
                'form' => $form->createView(),
                'breadCrumb' => self::BREAD_CRUMB,
                'activeMenu' => $this->activeMenu(self::ACTIVE_MENU)
            ]
        );
    }

    /**
     * @Route("/{id}", name="organization_show", methods={"GET"})
     */
    public function show(Organization $organization): Response
    {
        return $this->render('organization/show.html.twig',
            [
                'organization' => $organization,
                'breadCrumb' => self::BREAD_CRUMB,
                'activeMenu' => $this->activeMenu(self::ACTIVE_MENU)
            ]
        );
    }

    /**
     * @Route("/{id}/edit", name="organization_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Organization $organization): Response
    {
        $form = $this->createForm(OrganizationType::class, $organization);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('organization_show', ['id' => $organization->getId()]);
        }

        return $this->render('organization/edit.html.twig',
            [
            'organization' => $organization,
            'form' => $form->createView(),
            'breadCrumb' => self::BREAD_CRUMB,
            'activeMenu' => $this->activeMenu(self::ACTIVE_MENU)
            ]
        );
    }

    /**
     * @Route("/{id}", name="organization_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Organization $organization): Response
    {
        if ($this->isCsrfTokenValid('delete'.$organization->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($organization);
            $entityManager->flush();
        }

        return $this->redirectToRoute('organization_index');
    }
}
