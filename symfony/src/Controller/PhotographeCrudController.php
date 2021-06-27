<?php

namespace App\Controller;

use App\Entity\Photographe;
use App\Form\PhotographeType;
use App\Repository\PhotographeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/photographe/crud")
 */
class PhotographeCrudController extends AbstractController
{
    /**
     * @Route("/", name="photographe_crud_index", methods={"GET"})
     */
    public function index(PhotographeRepository $photographeRepository): Response
    {
        return $this->render('photographe_crud/index.html.twig', [
            'photographes' => $photographeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="photographe_crud_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $photographe = new Photographe();
        $form = $this->createForm(PhotographeType::class, $photographe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($photographe);
            $entityManager->flush();

            return $this->redirectToRoute('photographe_crud_index');
        }

        return $this->render('photographe_crud/new.html.twig', [
            'photographe' => $photographe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photographe_crud_show", methods={"GET"})
     */
    public function show(Photographe $photographe): Response
    {
        return $this->render('photographe_crud/show.html.twig', [
            'photographe' => $photographe,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="photographe_crud_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Photographe $photographe): Response
    {
        $form = $this->createForm(PhotographeType::class, $photographe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('photographe_crud_index');
        }

        return $this->render('photographe_crud/edit.html.twig', [
            'photographe' => $photographe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="photographe_crud_delete", methods={"POST"})
     */
    public function delete(Request $request, Photographe $photographe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$photographe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($photographe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('photographe_crud_index');
    }
}
