<?php

namespace App\Controller;

use App\Repository\PhotosRepository;
use App\Repository\TechniquesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TechniquesController extends AbstractController
{
    /**
     * @Route("/techniques", name="techniques")
     */
    public function index(TechniquesRepository $techniquesrepo,PhotosRepository $photosRepository): Response
    {
        return $this->render('techniques/index.html.twig', [
            'controller_name' => 'TechniquesController',
            'techniques' => $techniquesrepo->findAll(),
            'photos' => $photosRepository->findAll()
        ]);
    }
    /**
     * @Route("/techniques/details{id}", name="techniques_details")
     */
   public function showPhoto(int $id,TechniquesRepository $techniquesrepo, PhotosRepository $photosRepository): Response
   {
       $photosRepository->findBy(array('techniques'=>$id));

      return $this->render('techniques/details.html.twig', [
       
            'techniques' => $techniquesrepo->find($id),
             'photos' => $photosRepository->findAll()
       ]);
   
   }
}
