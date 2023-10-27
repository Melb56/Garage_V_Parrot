<?php

namespace App\Controller\Admin;

use App\Entity\Avis;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AvisCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Avis::class;
    }

    public function configureCrud(Crud $crud): Crud
    {

        return $crud
            ->setEntityLabelInSingular('Témoignage')
            ->setEntityLabelInPlural('Témoignage')

            ->setPageTitle("index", "Administration des témoignages")

            ->setPaginatorPageSize(10)
        ;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('fullName'),
            TextareaField::new('message')
                ->hideOnIndex(),
            DateTimeField::new('createdAt')
                ->hideOnForm()
        ];
    }
    
}
