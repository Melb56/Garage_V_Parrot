<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Annonce;
use App\Form\SearchForm;
use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/voitures-doccasion', name: 'annonce')]  
class AnnonceController extends AbstractController
{
    #[Route('/', name: 'index')]  
    public function Annonce (AnnonceRepository $annonceRepository, 
                             Request $request
                            ): Response
    {
       

        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);
        
        $form->handleRequest($request);
        $annonces = $annonceRepository-> findBySearch($data);   
    
     
        return $this->render('annonce/index.html.twig', [
            'annonces'=>$annonces,
            'form' => $form->createView(),
        ]);
        
    }
    
    
    #[Route('/{slug}', name: 'details')]
    public function details(Annonce $annonce): Response
    {
        return $this->render('annonce/details.html.twig', compact('annonce'));
    }
}
