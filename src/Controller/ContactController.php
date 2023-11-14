<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Service\MailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, EntityManagerInterface $em, MailService $mailService): Response
    {

        $contact = new Contact();
        $form=$this-> createForm(ContactType::class, $contact);

        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            $em->persist($contact);
            $em->flush();

        //Email
        $mailService->sendEmail(
            $contact->getEmail(),
            $contact->getSubject(),
            'emails/contact.html.twig',
            ['contact' => $contact]
        );

      /*  $this->addFlash(
            'success',
            'Votre message a été envoyé avec succès !'
        );

        return $this->redirectToRoute('contact');
    } else {
        $this->addFlash(
            'danger',
            $form->getErrors()
        );  */
    }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
