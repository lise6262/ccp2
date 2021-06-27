<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Repository\PhotosRepository;
use App\Repository\ContactRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    /**
     * @Route("/", name="contact_index", methods={"GET"})
     */
    public function index(ContactRepository $contactRepository,PhotosRepository $photosRepository): Response
    {
        return $this->render('contact_crud/index.html.twig', [
            'contacts' => $contactRepository->findAll(),
            'photos'=>$photosRepository->findAll()
        ]);
    }
     /**
     * @Route("/contact", name="contact")
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
                   'NOM : '.$contactFormData->getNom().\PHP_EOL.'OBJET DU MESSAGE : '.$contactFormData->getObjet().\PHP_EOL.'MESSAGE : '.$contactFormData->getMessage(),
                    'text/plain');
                
            $mailer->send($message);
            
            $this->addFlash('success', 'Vore message a été envoyé');
            return  $this->new($request);
            
            return $this->redirectToRoute('contact');
        }
        return $this->render('contact/index.html.twig', [
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

            return $this->redirectToRoute('contact');
        }

        return $this->render('contact_crud/new.html.twig', [
            'contact' => $contact,
            'form' => $form->createView(),
        ]);
    }
}
