<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use Doctrine\Persistence\ManagerRegistry;
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
    public function Annonce(AnnonceRepository $annonceRepository): Response
    {
        return $this->render('Annonce/index.html.twig', [
            'annonces'=>$annonceRepository->findAll()
        ]);
    }
    #[Route('/{slug}', name: 'details')]
    public function details(Annonce $annonce): Response
    {
        return $this->render('annonce/details.html.twig', compact('annonce'));
    }
}
