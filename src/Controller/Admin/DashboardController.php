<?php

namespace App\Controller\Admin;

use App\Entity\Annonce;
use App\Entity\AnnonceImage;
use App\Entity\Avis;
use App\Entity\Contact;
use App\Entity\Home;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Attribute\IsGranted;


class DashboardController extends AbstractDashboardController
{
    //#[IsGranted('ROLE_USER')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage V. Parrot');
    }

     public function configureMenuItems(): iterable
    {   
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Employé', 'fas fa-user', User::class)
                ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Annonce', 'fas fa-edit', Annonce::class);
        yield MenuItem::linkToCrud('Information', 'fas fa-edit', Home::class)
               ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Demandes de contact', 'fas fa-envelope', Contact::class); 
        yield MenuItem::linkToCrud('Gestion des témoignages', 'fas fa-user', Avis::class); 
    } 
}
