<?php

namespace App\Controller;


use App\Repository\AvisRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
public function index(): Response
    {

        
        return $this->render('base.html.twig', [
            'controller_name' => 'HomeController',
            
        ]);

    }
    
    
}