<?php

namespace App\Controller;

use App\Repository\PhotosRepository;
use App\Repository\CategoriesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories", name="categories")
     */
    public function index(CategoriesRepository $categorierepo,PhotosRepository $photosRepository): Response
    {
        return $this->render('categories/index.html.twig', [
            'controller_name' => 'CategoriesController',
            'categories' => $categorierepo->findAll(),
            'photos' => $photosRepository->findAll()
        ]);
            
        
    }
    /**
     * @Route("/categories/details{id}", name="categories_details")
     */
   public function showPhoto(int $id,CategoriesRepository $categoriesRepository, PhotosRepository $photosRepository): Response
   {
       $photosRepository->findBy(array('categories'=>$id));

      return $this->render('categories/details.html.twig', [
       
               'categories' => $categoriesRepository->find($id),
             'photos' => $photosRepository->findAll()
       ]);
   
   }
}
