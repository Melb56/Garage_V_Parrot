<?php

namespace App\Controller\Admin;

use App\Entity\Annonce;
use App\Entity\Product;
use App\Form\AjoutAnnonceType;
use Doctrine\Persistence\ManagerRegistry;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\String\Slugger\SluggerInterface;

class AnnonceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Annonce::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        //$this->denyAccessUnlessGranted('ROLE_USER');
        return $crud
            ->setEntityLabelInSingular('Annonce')
            ->setEntityLabelInPlural('Annonces')
            ->setPageTitle('index', "Administration des voitures d'occasions")
            ->setDateFormat('...')      
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('title'),
            NumberField::new('price'),
            TextField::new('dateTime'),
            NumberField::new('km'),
            TextField::new('carburant'),
            TextField::new('description'),
            TextField::new('option'),
            TextField::new('equipement'),
            TextField::new('slug')
        ];
    } 
    
   
}
