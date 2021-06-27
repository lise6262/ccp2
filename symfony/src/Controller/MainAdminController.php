<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainAdminController extends AbstractController
{
    /**
     * @Route("/main/admin", name="main_admin")
     */
    public function index(): Response
    {
        return $this->render('main_admin/index.html.twig', [
            'controller_name' => 'MainAdminController',
        ]);
    }
}
