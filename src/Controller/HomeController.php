<?php

namespace App\Controller;

use App\Controller\Common\BaseController;
use App\Entity\Organization;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends BaseController
{
    CONST BREAD_CRUMB = 'Home';
    CONST ACTIVE_MENU = 'dashboard';
    /**
     * @Route("/", name="admin_dashboard")
     */
    public function index(): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        if(!$user){
            return $this->redirect('/login');
        }

        return $this->render('app/dashboard.html.twig',
            [
                'breadCrumb' => self::BREAD_CRUMB,
                'activeMenu' => $this->activeMenu(self::ACTIVE_MENU)
            ]
        );
    }
}
