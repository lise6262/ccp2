<?php

namespace App\Controller;

use App\Entity\Photos;
use App\Repository\PhotosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarousselController extends AbstractController
{
    /**
     * @Route("/caroussel", name="caroussel")
     */
    public function index( PhotosRepository $photosRepository): Response
    {
        return $this->render('caroussel/index.html.twig', [
            'controller_name' => 'CarousselController',
            'photos'=>$photosRepository->findAll()

        ]);
    }
}
