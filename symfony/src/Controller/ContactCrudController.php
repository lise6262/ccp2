<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use App\Form\RegistrationFormType;

use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @Route("/contact/crud")
 */
class ContactCrudController extends AbstractController
{
    /**
     * @Route("/", name="contact_crud_index", methods={"GET"})
     */
    public function index(ContactRepository $contactRepository): Response
    {
        return $this->render('contact_crud/index.html.twig', [
            'contacts' => $contactRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="contact_crud_new", methods={"GET","POST"})
     */
    

    public function form(Request $request, MailerInterface $mailer)
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        $form = $this->createForm(ContactType::class);
        
        $form->handleRequest($request);
       
        if($form->isSubmitted() && $form->isValid()) {
            $contactFormData = $form->getData();
            
            
            $message = (new Email())
                ->from('rudy.idformation@laposte.net')
                ->to($contactFormData->getMail())
                ->cc('rudy.idformation@laposte.net')
                ->subject('RudyArtWall vous avez reçu un email')
                ->text('Expéditeur : '.$contactFormData->getMail().\PHP_EOL.
                   'Nom : '.$contactFormData->getNom().\PHP_EOL.'Votre message : '.$contactFormData->getMessage(),
                    'text/plain');
                
            $mailer->send($message);
            
            $this->addFlash('success', 'Vore message a été envoyé');
           return  $this->new($request);
            return $this->redirectToRoute('contact');
        }
        return $this->render('contact_crud/new.html.twig', [
            'controller_name' => 'ContactController',
            'form' => $form->createView()
        ]);
    }


    public function new(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();

            return $this->redirectToRoute('contact_crud_index');
        }

        return $this->render('contact_crud/new.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contact_crud_show", methods={"GET"})
     */
    public function show(Contact $contact): Response
    {
        return $this->render('contact_crud/show.html.twig', [
            'contact' => $contact,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contact_crud_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contact $contact): Response
    {
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contact_crud_index');
        }

        return $this->render('contact_crud/edit.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contact_crud_delete", methods={"POST"})
     */
    public function delete(Request $request, Contact $contact): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contact->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contact);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contact_crud_index');
    }
}
