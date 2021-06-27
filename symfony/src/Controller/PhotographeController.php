<?php

namespace App\Controller;

use App\Repository\PhotosRepository;
use App\Repository\PhotographeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PhotographeController extends AbstractController
{
    /**
     * @Route("/photographe", name="photographe")
     */
    public function index(PhotographeRepository $photographeRepository,PhotosRepository $photosRepository): Response
    {
        return $this->render('photographe/index.html.twig', [
            'controller_name' => 'PhotographeController',
            'photographes' => $photographeRepository->findAll(),
            'photos' => $photosRepository->findAll()
        ]);
    }
}
