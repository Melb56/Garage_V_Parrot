<?php

namespace App\Controller\Admin;

use App\Entity\Annonce;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class DashboardController extends AbstractDashboardController
{

    #[Route('/admin', name: 'admin')]
    //#[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        return $this->render('admin\dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage V. Parrot');
    }

     public function configureMenuItems(): iterable
    {   
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');   
        yield MenuItem::linkToCrud('Employé', 'fas fa-user', User::class);/*->setSubItems([
            MenuItem::linkToCrud('Ajouter un compte employé', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Supprimer un compte employé', 'fas fa-minus', User::class),
            MenuItem::linkToCrud('Modifier un compte employé', 'fas fa-pen', User::class)->setAction(Crud::PAGE_EDIT)
        ]);*/
        yield MenuItem::linkToCrud('Annonce', 'fas fa-edit', Annonce::class); 
    } 
}
