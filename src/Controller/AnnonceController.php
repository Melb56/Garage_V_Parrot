<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Entity\Annonce;
use App\Form\SearchForm;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/voitures-doccasion', name: 'annonce')]  
class AnnonceController extends AbstractController
{
    #[Route('/', name: 'index')]  
    public function Annonce (AnnonceRepository $annonceRepository, 
                             PaginatorInterface $paginator,
                             Request $request
                            ): Response
    {
       

        $data = new SearchData();
        $form = $this->createForm(SearchForm::class, $data);
        
        $form->handleRequest($request);
        //$searchData->page = $request->query->getInt('page', 1);
        $annonces = $annonceRepository-> findBySearch($data);   
        
        /*$annonces= $paginator->paginate(
            $data,
            $request->query->getInt('page', 1),
            5
        );*/
        return $this->render('Annonce/index.html.twig', [
            'annonces'=>$annonces,
            'form' => $form->createView()
        ]);
        
    }
    
    
    #[Route('/{slug}', name: 'details')]
    public function details(Annonce $annonce): Response
    {
        return $this->render('annonce/details.html.twig', compact('annonce'));
    }
}
