<?php

namespace App\Controller;

use App\Repository\PhotosRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/main", name="main")
     */
    public function index(PhotosRepository $photosRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'photo' => $photosRepository->findBy(['id'=>'1']),
            'photos' => $photosRepository->findAll()
        ]);
    }
}
