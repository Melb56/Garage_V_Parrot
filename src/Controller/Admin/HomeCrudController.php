<?php

namespace App\Controller\Admin;

use App\Entity\Home;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class HomeCrudController extends AbstractCrudController
{

    public static function getEntityFqcn(): string
    {
        return Home::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        //$this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $crud
            ->setEntityLabelInSingular('Information')
            ->setEntityLabelInPlural('Informations')
            ->setPageTitle("index", "Administration des informations");
           //->setDateFormat('...')      
        ;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm()
                ->hideOnIndex(),
            TextField::new('title'),
            TextField::new('description'),
            TextField::new('reparation'),
            TextField::new('entretien'),
            TextField::new('voiture'),
        ];
    }
    
}
