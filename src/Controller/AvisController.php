<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    #[Route('/témoignage', name: 'avis')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $avis = new Avis();
        $form = $this->createForm(AvisType::class, $avis);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $avis = $form->getData();

            $em->persist($avis);
            $em->flush();

            $this->addFlash(
                'success',
                'Votre témoignage a été envoyé avec succès !'
            );
    
            return $this->redirectToRoute('home\index.html.twig');
        } else {
            $this->addFlash(
                'danger',
                $form->getErrors()
            ); 
        }

        return $this->render('avis/avis.html.twig', [
            'avis' => $form->createView(),
            
        ]);
    }
}
